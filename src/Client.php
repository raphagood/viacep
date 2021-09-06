<?php

namespace Raphagood\ViaCEP;

use GuzzleHttp\Client as HttpClient;

class Client
{

    private $zipCode;
    private $httpClient;
    

    public function __construct($baseUri = 'https://viacep.com.br/ws/')
    {
        $this->httpClient = new HttpClient([
            'base_uri' => $baseUri
        ]);
    }

    /**
    * Find address by zipCode
    *
    * @param  string $zipCode
    *
    * @return self
    */
    public function findByZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }


    /**
    * Gets the response to the request according to the type informed
    *
    * @param  string $type
    *
    * @return ...
    */
    public function get($type)
    {

        return $this->httpClient->get("$this->zipCode/$type");
      
    }


    /**
    * Get the response in json 
    *
    * @return ...
    */
    public function toJson()
    {
        
        return $this->get('json')->getBody()->getContents();

    }

    /**
    * Get the response in xml
    *
    * @return ...
    */
    public function toXml()
    {

        return $this->get('xml')->getBody()->getContents();
        
    }


    /**
    * Get the response in piped
    *
    * @return ...
    */
    public function toPiped()
    {

        return $this->get('piped')->getBody()->getContents();

    }


    /**
    * Get the response in query 
    *
    * @return ...
    */
    public function toQuerty()
    {

        return $this->get('querty')->getBody()->getContents();

    }


    /**
    * Convert response to array 
    *
    * @return 
    */
    public function toArray()
    {

        return (array) json_decode($this->get('json')->getBody()->getContents());

    }


}

