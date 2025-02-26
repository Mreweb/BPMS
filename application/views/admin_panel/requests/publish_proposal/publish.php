<?php $_DIR = base_url(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deploy & Interact with Smart Contract</title>
    <script src="https://cdn.jsdelivr.net/npm/web3@1.8.0/dist/web3.min.js"></script>
</head>
<body>

<?php var_dump($proposalId); ?>
<?php var_dump($proposalName); ?>

<button onclick="createProposal('707fc9926dd344c66ab01bab3866c','KASHEF')">createProposal Kashef</button>
<button onclick="compareStrings('11','11')">compareStrings</button>
<script>
    // Connect to your blockchain node (example uses Binance Smart Chain Testnet)
    const rpcURL = "https://data-seed-prebsc-1-s1.binance.org:8545";
    const web3 = new Web3(new Web3.providers.HttpProvider(rpcURL));
    // Your private key (DO NOT expose in production)
    const privateKey = "4f6d419e841a2a21c72ca84379707fc9926dd344c66ab01bab3866cfc5cd7e07";
    // Create an account from the private key
    const account = web3.eth.accounts.privateKeyToAccount(privateKey);
    web3.eth.accounts.wallet.add(account);
    // Smart contract details: ABI and address
    const contractAddress = "0x869A5C9fae1fb8aAaCDC77705FDe926077e41aBD";
    const abi = [
        {
            "inputs": [],
            "stateMutability": "nonpayable",
            "type": "constructor"
        },
        {
            "stateMutability": "payable",
            "type": "fallback"
        },
        {
            "inputs": [
                {
                    "internalType": "string",
                    "name": "_a",
                    "type": "string"
                },
                {
                    "internalType": "string",
                    "name": "_b",
                    "type": "string"
                }
            ],
            "name": "compareStrings",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "pure",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "contractOwner",
            "outputs": [
                {
                    "internalType": "address",
                    "name": "",
                    "type": "address"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "string",
                    "name": "_proposalId",
                    "type": "string"
                },
                {
                    "internalType": "string",
                    "name": "_name",
                    "type": "string"
                }
            ],
            "name": "createProposal",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "getAllProposal",
            "outputs": [
                {
                    "components": [
                        {
                            "internalType": "string",
                            "name": "proposalId",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "name",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "voteCount",
                            "type": "uint256"
                        }
                    ],
                    "internalType": "struct TokenizeVoteContract.Proposal[]",
                    "name": "",
                    "type": "tuple[]"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "string",
                    "name": "_proposalId",
                    "type": "string"
                }
            ],
            "name": "getProposal",
            "outputs": [
                {
                    "components": [
                        {
                            "internalType": "string",
                            "name": "proposalId",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "name",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "voteCount",
                            "type": "uint256"
                        }
                    ],
                    "internalType": "struct TokenizeVoteContract.Proposal",
                    "name": "",
                    "type": "tuple"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "isOwner",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "name": "proposals",
            "outputs": [
                {
                    "internalType": "string",
                    "name": "proposalId",
                    "type": "string"
                },
                {
                    "internalType": "string",
                    "name": "name",
                    "type": "string"
                },
                {
                    "internalType": "uint256",
                    "name": "voteCount",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "string",
                    "name": "_proposalId",
                    "type": "string"
                },
                {
                    "internalType": "bool",
                    "name": "_vote",
                    "type": "bool"
                }
            ],
            "name": "voteProposal",
            "outputs": [
                {
                    "components": [
                        {
                            "internalType": "string",
                            "name": "proposalId",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "name",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "voteCount",
                            "type": "uint256"
                        }
                    ],
                    "internalType": "struct TokenizeVoteContract.Proposal",
                    "name": "",
                    "type": "tuple"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "stateMutability": "payable",
            "type": "receive"
        }
    ];
    // Create a contract instance
    const contract = new web3.eth.Contract(abi, contractAddress);

    // Function to send a transaction that changes contract state
    async function createProposal(_proposalId, _name) {
        try {
            // Prepare the transaction data by encoding the function call
            const txData = contract.methods.createProposal(_proposalId, _name).encodeABI();

            // Estimate the gas required
            const gas = await contract.methods.createProposal(_proposalId, _name).estimateGas({ from: account.address });
            // Create a transaction object
            const tx = {
                from: account.address,
                to: contractAddress,
                gas: gas,
                data: txData,
            };

            // Sign the transaction using your private key
            const signedTx = await web3.eth.accounts.signTransaction(tx, privateKey);

            // Send the signed transaction
            web3.eth.sendSignedTransaction(signedTx.rawTransaction)
                .on('transactionHash', hash => {
                    console.log("Transaction hash:", hash);
                })
                .on('receipt', receipt => {
                    console.log("Transaction receipt:", receipt);
                    alert("Transaction successful!");
                })
                .on('error', error => {
                    console.error("Error sending transaction:", error);
                });
        } catch (error) {
            console.error("Error writing value:", error);
        }
    }
    // Function to call a read-only contract method
    async function compareStrings(a,b) {
        try {
            const value = await contract.methods.compareStrings(a,b).call();
            console.log("compareStrings :", value);
        } catch (error) {
            console.error("Error compareStrings:", error);
        }
    }

</script>
</body>
</html>
