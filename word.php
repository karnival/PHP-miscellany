<?php
    /*
        Takes a url of the form "http://place.tld/path/to/word.php?words=these are words" then returns the google images result page for "these are words".
        Used for trying to get an old flash project (which relied on another such PHP script) to work.
    */

    $words = $_GET["words"];

    //replaces all spaces with %20 to appease google, also deals with multiple contiguous space characters
    $url = "http://www.google.com/xhtml?site=images&q=".$words;
    $url = preg_replace("/ {1,}/","%20",$url);

    //echo $url."\n";


    $page = file_get_contents($url);

    echo $page;
?>
