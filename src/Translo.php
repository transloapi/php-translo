<?php

namespace Translo;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Translo
{
    private Client $client;
    private const HOST = 'translo.p.rapidapi.com';
    private const BASE_URL = 'https://' . self::HOST . '/api/v3/';
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => self::BASE_URL,
        ]);
    }

    /**
     * @param string | array $text
     * @throws GuzzleException
     */
    public function translate($text, string $fromLang, string $toLang): array
    {
        $multipart = [
            [
                "name" => "from",
                "contents" => $fromLang
            ],
            [
                "name" => "to",
                "contents" => $toLang
            ],
        ];
        if (is_array($text)) {
            foreach ($text as $content) {
                $multipart[] = [
                    "name" => "text",
                    "contents" => $content
                ];
            }
        } else {
            $multipart[] = [
                "name" => "text",
                "contents" => $text
            ];
        }

        $response = $this->client->request('POST', 'translate', [
            'headers' => [
                'X-RapidAPI-Key' => $this->apiKey,
                'X-RapidAPI-Host' => self::HOST
            ],
            'multipart' => $multipart
        ]);
        return $this->responseToArray($response);
    }

    /**
     * @throws GuzzleException
     */
    public function batchTranslate(array $body): array
    {
        $response = $this->client->request('POST', 'batch_translate', [
            'headers' => [
                'X-RapidAPI-Key' => $this->apiKey,
                'X-RapidAPI-Host' => self::HOST
            ],
            'json' => $body
        ]);
        return $this->responseToArray($response);
    }

    /**
     * @throws GuzzleException
     */
    public function detect(string $text): array
    {
        $response = $this->client->request('GET', 'detect', [
            'headers' => [
                'X-RapidAPI-Key' => $this->apiKey,
                'X-RapidAPI-Host' => self::HOST
            ],
            'query' => [
                'text' => $text
            ]
        ]);
        return $this->responseToArray($response);
    }

    private function responseToArray(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
