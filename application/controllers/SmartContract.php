<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Web3\Web3;
use Web3\Contract;
use Web3\Utils;
use kornrunner\Keccak;
use Elliptic\EC;



use Web3\Providers\HttpProvider;

class SmartContract extends CI_Controller {

    private $web3;
    private $contract;
    private $accountAddress;
    private $privateKey;
    private $contractAddress;
    private $abi;

    public function __construct(){
        parent::__construct();


        require_once APPPATH.'../vendor/autoload.php';
        // Set up RPC URL and initialize web3
        $rpcURL = "https://data-seed-prebsc-1-s1.binance.org:8545";

        $this->web3 = new Web3($rpcURL);

        // Your private key (DO NOT expose in production)
        $this->privateKey = "4f6d419e841a2a21c72ca84379707fc9926dd344c66ab01bab3866cfc5cd7e07";
        $this->accountAddress = "0x73dCBCaBb0c434D64CEdF3a26F7d9292362E55D8";

        // Smart contract details
        $this->contractAddress = "0x869A5C9fae1fb8aAaCDC77705FDe926077e41aBD";


        $this->abi = '[
            {"inputs":[],"stateMutability":"nonpayable","type":"constructor"},
            {"stateMutability":"payable","type":"fallback"},
            {"inputs":[{"internalType":"string","name":"_a","type":"string"},{"internalType":"string","name":"_b","type":"string"}],"name":"compareStrings","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"pure","type":"function"},
            {"inputs":[],"name":"contractOwner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},
            {"inputs":[{"internalType":"string","name":"_proposalId","type":"string"},{"internalType":"string","name":"_name","type":"string"}],"name":"createProposal","outputs":[],"stateMutability":"nonpayable","type":"function"},
            {"inputs":[],"name":"getAllProposal","outputs":[{"components":[{"internalType":"string","name":"proposalId","type":"string"},{"internalType":"string","name":"name","type":"string"},{"internalType":"uint256","name":"voteCount","type":"uint256"}],"internalType":"struct TokenizeVoteContract.Proposal[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},
            {"inputs":[{"internalType":"string","name":"_proposalId","type":"string"}],"name":"getProposal","outputs":[{"components":[{"internalType":"string","name":"proposalId","type":"string"},{"internalType":"string","name":"name","type":"string"},{"internalType":"uint256","name":"voteCount","type":"uint256"}],"internalType":"struct TokenizeVoteContract.Proposal","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},
            {"inputs":[],"name":"isOwner","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},
            {"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"proposals","outputs":[{"internalType":"string","name":"proposalId","type":"string"},{"internalType":"string","name":"name","type":"string"},{"internalType":"uint256","name":"voteCount","type":"uint256"}],"stateMutability":"view","type":"function"},
            {"inputs":[{"internalType":"string","name":"_proposalId","type":"string"},{"internalType":"bool","name":"_vote","type":"bool"}],"name":"voteProposal","outputs":[{"components":[{"internalType":"string","name":"proposalId","type":"string"},{"internalType":"string","name":"name","type":"string"},{"internalType":"uint256","name":"voteCount","type":"uint256"}],"internalType":"struct TokenizeVoteContract.Proposal","name":"","type":"tuple"}],"stateMutability":"nonpayable","type":"function"},
            {"stateMutability":"payable","type":"receive"}
        ]';

        // Create the contract instance
        $this->contract = new Contract($this->web3->provider, $this->abi);
        $this->contract->at($this->contractAddress);
    }

    // Helper function to derive address from private key
    private function privateKeyToAddress($privateKey)
    {
        // Remove 0x prefix if exists
        if (strpos($privateKey, '0x') === 0) {
            $privateKey = substr($privateKey, 2);
        }
        $ec = new EC('secp256k1');
        $keyPair = $ec->keyFromPrivate($privateKey);
        $pubKey = $keyPair->getPublic(false, 'hex'); // uncompressed public key
        // Remove first byte (format indicator "04")
        $pubKeyHex = substr($pubKey, 2);
        $hash = Keccak::hash(hex2bin($pubKeyHex), 256);
        $address = "0x" . substr($hash, -40);
        return strtolower($address);
    }

    // Example method to call a read-only function (compareStrings)
    public function compareStrings()
    {
        // Example strings; these could be passed via GET/POST
        $a = $this->input->get('a') ?? "hello";
        $b = $this->input->get('b') ?? "world";


        $this->contract->call('compareStrings', $a, $b, function ($err, $result) {
            if ($err !== null) {
                echo "Error calling compareStrings: " . $err->getMessage();
                return;
            }
            echo "Result of compareStrings: " . ($result[0] ? 'true' : 'false');
        });
    }

    // Example method to send a state-changing transaction (e.g., createProposal)
    public function createProposal()
    {
        // Get parameters from request (or hardcode for testing)
        $proposalId = $this->input->post('proposalId') ?? "proposal123";
        $name = $this->input->post('name') ?? "My Proposal";

        // First, get nonce
        $this->web3->eth->getTransactionCount($this->accountAddress, function ($err, $nonce) use ($proposalId, $name) {
            if ($err !== null) {
                echo "Error getting nonce: " . $err->getMessage();
                return;
            }

            // Get data for the function call
            $data = $this->contract->at()->getData('createProposal', $proposalId, $name);

            // Build transaction data
            $tx = [
                'nonce' => Utils::toHex($nonce, true),
                'from' => $this->accountAddress,
                'to' => $this->contractAddress,
                'data' => $data,
                'gas' => Utils::toHex(200000, true),
                'gasPrice' => Utils::toHex(10 * 1e9, true) // 10 Gwei example
            ];

            // Signing the transaction
            // Note: You would use kornrunner/ethereum-offline-raw-tx or similar to sign the tx
            // For brevity, assume you have a function signTransaction() that does this:
            $signedTx = $this->signTransaction($tx, $this->privateKey);

            // Send the raw transaction
            $this->web3->eth->sendRawTransaction($signedTx, function ($err, $txHash) {
                if ($err !== null) {
                    echo "Error sending transaction: " . $err->getMessage();
                    return;
                }
                echo "Transaction sent. TxHash: " . $txHash;
            });
        });
    }

    // Dummy signTransaction function. You should implement signing using a proper library.
    private function signTransaction($tx, $privateKey)
    {
        // Use kornrunner/ethereum-offline-raw-tx or similar to sign the transaction.
        // This is a placeholder and will not work as-is.
        return '0xSIGNED_TRANSACTION_DATA';
    }
}
