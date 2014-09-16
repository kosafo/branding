<?php
/**
 * Created by Kwame Osafo.
 * Date: 9/15/14
 * Time: 11:09 AM
 */
require('CURL.php');

class Branding
{
    private $curlobj;


    public function __construct($url){
        $this->curlobj = new CURL($url);

    }

    //get url
    protected function getURL(){
       $header = $this->curlobj->getSiteHeaders();

      return $header['url'];
    }

    //get description
    protected function getSiteDescription(){

        $dom = new DOMDocument;
        $dom->loadHTML($this->curlobj->getSiteBody());
        $metadata = $dom->getElementsByTagName("meta");

        foreach ($metadata as $meta){

            if (strtolower($meta->getAttribute("name")) == "description"){

                return $meta->getAttribute("content");
            }
        }

        return null;

    }

    //get logo
    protected function getSiteLogo(){
        $dom = new DOMDocument;
        $dom->loadHTML($this->curlobj->getSiteBody());
        $images = $dom->getElementsByTagName("img");

        foreach ($images as $image){

            if (strpos(strtolower($image->getAttribute("src")),"logo")){

                return $image->getAttribute("src");
            }
        }

        return null;

    }

    //get branding
    public function getSiteBrand(){
        $brandInfo = array();

        $brandInfo['url'] = $this->getURL();
        $brandInfo['description'] = $this->getSiteDescription();
        $brandInfo['logo'] = $this->getSiteLogo();

        echo json_encode($brandInfo);
    }


}
