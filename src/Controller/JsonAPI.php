<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JsonAPI
{
    #[Route("/api/quote", name: "api_quote")]
    public function jsonQuote(): Response
    {
        $quotes = [
            "Knowledge is power",
            "Change the world by being yourself.",
            "You miss 100% of the shots you don’t take."
        ];

        $quote = $quotes[array_rand($quotes)];

        $data = [
            'quote' => $quote,
            'date' => date('Y-m-d'),
            'timestamp' => date('H:i:s'),
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
