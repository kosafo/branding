<?php
/**
 * Created by Kwame Osafo.
 * Date: 9/15/14
 * Time: 8:43 AM
 */
class CURL
{
    private $useragent = 'Googlebot/2.1 (+http://www.google.com/bot.html)';
    private $timeout = 30;
    private $maxRedirects = 4;
    private $followLocation = true;
    private $url;

    public function __construct($url){
           $this->url = $url;
    }

    private function validated($url){

        if(!filter_var($url, FILTER_VALIDATE_URL))
        {
            return false;
        }
        else
        {
            return true;
        }

    }


    public function getSiteHeaders(){
        //echo "in brand";
        if ($this->validated($this->url)){

            $resource = curl_init();
            curl_setopt($resource,CURLOPT_USERAGENT,$this->useragent);
            curl_setopt($resource,CURLOPT_URL,$this->url);
            curl_setopt($resource,CURLOPT_TIMEOUT,$this->timeout);
            curl_setopt($resource,CURLOPT_MAXREDIRS,$this->maxRedirects);
            curl_setopt($resource,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($resource,CURLOPT_FOLLOWLOCATION,$this->followLocation);
            curl_setopt($resource,CURLOPT_HEADER,true);
            curl_setopt($resource,CURLOPT_NOBODY,true);

            curl_exec($resource);

            $result = curl_getinfo($resource);

            //print_r($result);
            curl_close($resource);

            return $result;

        }
        else {
            return null;
        }

    }

    public function getSiteBody(){
        //echo "in brand";
        if ($this->validated($this->url)){

            $resource = curl_init();
            curl_setopt($resource,CURLOPT_USERAGENT,$this->useragent);
            curl_setopt($resource,CURLOPT_URL,$this->url);
            curl_setopt($resource,CURLOPT_TIMEOUT,$this->timeout);
            curl_setopt($resource,CURLOPT_MAXREDIRS,$this->maxRedirects);
            curl_setopt($resource,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($resource,CURLOPT_FOLLOWLOCATION,$this->followLocation);

            $result =  curl_exec($resource);

            curl_close($resource);

            return $result;

        }
        else {
            return null;
        }

    }
}
