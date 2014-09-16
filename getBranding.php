<?php
/**
 * Created by Kwame Osafo.
 * Date: 9/15/14
 * Time: 8:33 AM
 */
include 'Branding.php';

//get url
$url = $_GET['url'];


if (!empty($url)){

    if(!filter_var($url, FILTER_VALIDATE_URL))
    {
        echo "URL not valid";
    }
    else
    {
        $brand = new Branding($url);
        $brand->getSiteBrand();
    }

}
else {
    echo "url not set";
}
