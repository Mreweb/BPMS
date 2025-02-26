<?php
/* application/hooks/LogQueryHook.php */
class LogQueryHook {

    function log_queries() {
        $CI =& get_instance();
        $times = $CI->db->query_times;
        $dbs    = array();
        $output = NULL;
        $queries = $CI->db->queries;

        if (count($queries) == 0){
            $output .= "no queries\n";
        }else{
            foreach ($queries as $key=>$query){
                $output .= $query . " ";
            }
        }
        $output = str_replace(array("\r", "\n"), '', $output);
        $output .= jDateTime::date("Y/m/d H:i:s", false, false);

        $CI->load->helper('file');
        write_file(APPPATH  . "/logs/queries.log.txt", "\n".$output, 'a+');
    }
}