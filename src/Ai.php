<?php

namespace Hamato\PropellerAi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;

class Ai
{
    /**
     * Responder trait
     */
    use Responder;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    private $baseApi = 'http://35.190.159.248:8001/api/';

    /**
     * @var string
     */
    private $classificationEndpoint = 'classify/image';

    /**
     * Ai constructor.
     *
     * Instantiates the Guzzle http client.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * @param $image string File path
     * @return array
     */
    protected function prepareImageData($image)
    {
        $imageData = [
            'image' => base64_encode( file_get_contents( $image ) )
        ];

        return $imageData;
    }

    /**
     * @param $imageData array
     * @return string
     */
    protected function executeRequest($imageData)
    {
        try {
            $response = $this->httpClient->request(
                'POST',
                $this->baseApi . $this->classificationEndpoint,
                [
                    'json' => $imageData
                ]
            );

        } catch (ServerException $e) {

            return $e->getResponse()->getBody()->getContents();
        }

        return $response->getBody()->getContents();
    }
}
