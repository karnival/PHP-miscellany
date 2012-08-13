<?php
    $words = $_GET["words"];

    //replaces all spaces with %20 to appease google, also deals with multiple contiguous space characters
    $url = "http://www.google.com/xhtml?site=images&q=".$words;
    $url = preg_replace("/ {1,}/","%20",$url);

    //echo $url."\n";


    $page = file_get_contents($url);

    echo $page;
?>
