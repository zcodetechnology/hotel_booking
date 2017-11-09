<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 04/10/2017
 * Time: 01:46 AM
 */

class Utility {

    public function array_column(array $input, $column_key, $index_key = null) {

        $result = array();
        foreach ($input as $k => $v)
            $result[$index_key ? $v[$index_key] : $k] = $v[$column_key];

        return $result;
    }

    public function array_key(array $array, $column_filter, $value_filer) {
        foreach ($array as $key => $value) {
            if (is_array($value) && $value[$column_filter] == $value_filer) {
                return $key;
            }
        }
        return null;
    }

    public function search_in_array($search = '', array $array) {
        $result = false;
        //IF SEARCH IS NOT EMPTY AND THE TABLE AN ARRAY
        if ($search != '' && gettype($array) == 'array') {

            foreach ($array as $key => $value) {
                //IF TERM SEARCH IS IN ARRAY
                if (stristr($value, $search)) {
                    $result = true;
                    break;
                }
            }
        }


        return $result;
    }

    public function valueArrayInArray($valueArray, $authorizeArray) {

        if (is_array($valueArray) && is_array($authorizeArray)) {

            foreach ($valueArray as $value) {
                if (in_array($value, $authorizeArray))
                    return true;
            }
        } else
            return false;
    }

    public function get_array_value($array, $keySearch = '', $keyFilter = '', $keyFilterValue = '') {

        $return = false;

        if (is_array($array) && $keySearch != '' && $keyFilter != '' && $keyFilterValue != '') {

            foreach ($array as $k => $v) {

                if ($v[$keyFilter] == $keyFilterValue) {
                    $return = $v[$keySearch];
                    break;
                }
            }
        }
        return $return;
    }

    public function detect_old_browser() {
        $old = false;
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {

            // IE <= 9
            // User Agent: Opera/9.80 (Windows NT 6.1; U; en) Presto/2.10.229 Version/11.61

            if (preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches)) {

                if ($matches[1] <= 8) {
                    $old = true;
                }
            }
            // Firefox <=14
            // User Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2
            elseif (preg_match('#Firefox/(\d+)\.(\d+)[\.\d]+#si', $_SERVER['HTTP_USER_AGENT'], $matches)) {
                if ($matches[1] <= 14) {
                    $old = true;
                }
            }
            // Safari < 5
            // User Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7
            elseif (preg_match('#Version/(\d+)[\.\d]+ Safari/[\.\d]+#si', $_SERVER['HTTP_USER_AGENT'], $matches)) {
                if ($matches[1] < 5) {
                    $old = true;
                }
            }
            // opera < 11
            // User Agent: Opera/9.80 (Windows NT 6.1; U; en) Presto/2.10.229 Version/11.61
            elseif (preg_match('#Opera/[\.\d]+.*?Version/(\d+)[\.\d]+#si', $_SERVER['HTTP_USER_AGENT'], $matches)) {
                if ($matches[1] < 11) {
                    $old = true;
                }
            }
        }

        if ($old) $this->redirection('old');

        return $old;
    }

    function getIpAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function isValidUrl($url){
        // first do some quick sanity checks:
        if(!$url || !is_string($url)){
            return false;
        }
        // quick check url is roughly a valid http request: ( http://blah/... )
        if( ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url) ){
            return false;
        }
        // the next bit could be slow:

        if($this->getHttpResponseCode_using_getheaders($url) != 200){  // use this one if you cant use curl
            return false;
        }
        // all good!
        return true;
    }

    public function getHttpResponseCode_using_curl($url, $followredirects = true){
        // returns int responsecode, or false (if url does not exist or connection timeout occurs)
        // NOTE: could potentially take up to 0-30 seconds , blocking further code execution (more or less depending on connection, target site, and local timeout settings))
        // if $followredirects == false: return the FIRST known httpcode (ignore redirects)
        // if $followredirects == true : return the LAST  known httpcode (when redirected)
        if(! $url || ! is_string($url)){
            return false;
        }
        $ch = @curl_init($url);
        if($ch === false){
            return false;
        }
        @curl_setopt($ch, CURLOPT_HEADER         ,true);    // we want headers
        @curl_setopt($ch, CURLOPT_NOBODY         ,true);    // dont need body
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER ,true);    // catch output (do NOT print!)
        if($followredirects){
            @curl_setopt($ch, CURLOPT_FOLLOWLOCATION ,true);
            @curl_setopt($ch, CURLOPT_MAXREDIRS      ,10);  // fairly random number, but could prevent unwanted endless redirects with followlocation=true
        }else{
            @curl_setopt($ch, CURLOPT_FOLLOWLOCATION ,false);
        }
//      @curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);   // fairly random number (seconds)... but could prevent waiting forever to get a result
//      @curl_setopt($ch, CURLOPT_TIMEOUT        ,6);   // fairly random number (seconds)... but could prevent waiting forever to get a result
//      @curl_setopt($ch, CURLOPT_USERAGENT      ,"Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1");   // pretend we're a regular browser
        @curl_exec($ch);
        if(@curl_errno($ch)){   // should be 0
            @curl_close($ch);
            return false;
        }
        $code = @curl_getinfo($ch, CURLINFO_HTTP_CODE); // note: php.net documentation shows this returns a string, but really it returns an int
        @curl_close($ch);
        return $code;
    }

    public function getHttpResponseCode_using_getheaders($url, $followredirects = true){
        // returns string responsecode, or false if no responsecode found in headers (or url does not exist)
        // NOTE: could potentially take up to 0-30 seconds , blocking further code execution (more or less depending on connection, target site, and local timeout settings))
        // if $followredirects == false: return the FIRST known httpcode (ignore redirects)
        // if $followredirects == true : return the LAST  known httpcode (when redirected)
        if(! $url || ! is_string($url)){
            return false;
        }
        $headers = @get_headers($url);
        if($headers && is_array($headers)){
            if($followredirects){
                // we want the the last errorcode, reverse array so we start at the end:
                $headers = array_reverse($headers);
            }
            foreach($headers as $hline){
                // search for things like "HTTP/1.1 200 OK" , "HTTP/1.0 200 OK" , "HTTP/1.1 301 PERMANENTLY MOVED" , "HTTP/1.1 400 Not Found" , etc.
                // note that the exact syntax/version/output differs, so there is some string magic involved here
                if(preg_match('/^HTTP\/\S+\s+([1-9][0-9][0-9])\s+.*/', $hline, $matches) ){// "HTTP/*** ### ***"
                    $code = $matches[1];
                    return $code;
                }
            }
            // no HTTP/xxx found in headers:
            return false;
        }
        // no headers :
        return false;
    }

}