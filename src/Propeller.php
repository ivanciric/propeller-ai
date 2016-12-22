<?php

namespace Hamato\PropellerAi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;

class Propeller
{
    use Responder;

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $baseApi = 'http://104.196.212.163:8001/api/';

    /**
     * Propeller constructor.
     *
     * Instantiates the Guzzle http client.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * @param $image
     * @return string
     */
    public function recognize($image)
    {
        $imageByteArray = $this->convertImageToByteArray($image);

        $propellerResponse = $this->executeRequest($imageByteArray);

        return $this->formatResponse($propellerResponse);
    }

    /**
     * @param $image
     * @return array
     */
    private function convertImageToByteArray($image)
    {
        $file = file_get_contents($image);

        $byteArr = str_split($file);

        foreach ($byteArr as $key => $val) {

            $byteArr[$key] = ord($val);
        }

        return $byteArr;
    }

    /**
     * @param $imageByteArray
     * @return string
     */
    private function executeRequest($imageByteArray)
    {
        try {
            $request = $this->httpClient->post(
                $this->baseApi . 'classify/image',
                [
                    'debug' => true
                ],
                $imageByteArray
            );

            $response = $request->send();

        } catch (ServerException $e) {

            return $e->getMessage();
        }

        return $response;
    }
}
