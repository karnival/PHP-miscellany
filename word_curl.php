<?php
    /*
        Takes a url of the form "http://place.tld/path/to/word_curl.php?words=these are words" then returns the google images result page for "these are words".
        Used for trying to get an old flash project (which relied on another such PHP script) to work.
        Uses curl.
    */

    $words = $_GET["words"];

    function graburl($url){
        $curh = curl_init();
        $timeout = 6;
        curl_setopt($curh,CURLOPT_URL,$url);
        curl_setopt($curh,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curh,CURLOPT_CONNECTTIMEOUT,$timeout);

        $page = curl_exec($curh);
        curl_close($curh);

        return $page;
    }

    //replaces all spaces with %20 to appease google, also deals with multiple contiguous space characters
    $url = "http://www.google.com/xhtml?site=images&q=".$words;
    $url = preg_replace("/ {1,}/","%20",$url);

    //echo $url."\n";

    $page = graburl($url);

    echo $page;
?>
