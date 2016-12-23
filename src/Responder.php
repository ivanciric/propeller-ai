<?php

namespace Hamato\PropellerAi;

trait Responder
{
    /**
     * @param $response string Json
     * @return array
     */
    public function formatResponse($response)
    {
        $response = json_decode($response);

        $limit = (count($response->categories) >= 5) ? 5 : count($response->categories);

        $classifications = array_slice($response->categories, 0, $limit);

        foreach ($classifications as $key => $classification){

            $classifications[$key] = strstr($classification, " ");
        }

        return $classifications;
    }
}
