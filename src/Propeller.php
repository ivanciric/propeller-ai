<?php

namespace Hamato\PropellerAi;

class Propeller extends Ai
{
    /**
     * Propeller constructor.
     *
     * Instantiates the Guzzle http client.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $image string File path
     * @return array
     */
    public function recognize($image)
    {
        $imageData = $this->prepareImageData($image);

        $propellerResponse = $this->executeRequest($imageData);

        return $this->formatResponse($propellerResponse);
    }
}
