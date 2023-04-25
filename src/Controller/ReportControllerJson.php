<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ReportControllerJson
{
    #[Route("/api/quote", name: "quote")]
    public function jsonQuotes(): Response
    {
        $data = [
            "I always wanted to be somebody, but now I realize I should have been more specific. - Lily Tomlin",
            "I am not great at the advice. Can I interest you in a sarcastic comment? - Chandler Bing, Friends",
            "I used to think I was indecisive, but now I am not so sure. - Unknown",
            "I am not arguing, I am just explaining why I am right. - Unknown"
        ];

        $randomIndex = array_rand($data);
        $randomQuote = $data[$randomIndex];
        $currentTimestamp = time();
        $timestampString = date('F j, Y H:i:s', $currentTimestamp);

        $responseData = [
            'quote' => $randomQuote,
            'timestamp' => $timestampString
        ];

        $response = new JsonResponse($responseData);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;

    }
}
