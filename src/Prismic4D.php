<?php

declare(strict_types=1);

namespace Prismic4D;

use GuzzleHttp\Client;
use Prismic4D\Page;
use Prismic4D\PrismicURL;


class Prismic4D
{
    private $projectName;
    private $accessToken;

    function setProjectName($projectName)
    {
        $this->projectName = $projectName;
    }

    function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    // getRef
    function getRef()
    {
        $client = new Client();

        $url = new PrismicURL($this->projectName, '/api/v2');
        $url->add_param('access_token', $this->accessToken);

        $response = $client->request('GET', $url->getURL());
        $body = (string) $response->getBody();
        $data = json_decode($body);
        return $data->refs[0]->ref;
    }

    function getDocument($ref, $page_name, $lang = null, $parameters = null)
    {
        return $this->getPage($ref, $page_name, $lang, $parameters);
    }

    // getDocument
    function getPage($ref, $page_name, $lang = null, $parameters = null)
    {
        $page = new Page();

        $client = new Client();

        $url = new PrismicURL($this->projectName, '/api/v2/documents/search');
        $url->add_param('access_token', $this->accessToken);
        $url->add_param('ref', $ref);

        if ($lang) {
            $url->add_param('lang', $lang);
        }

        if ($parameters) {
            foreach ($parameters as $key => $value) {
                $url->add_param($key, $value);
            }
        }

        $response = $client->request('GET', $url->getURL());
        // get response body
        $body = (string) $response->getBody();
        // decode response body
        $data = json_decode($body);

        foreach ($data->results as $result) {
            if ($result->type == $page_name) {
                $page->setID($result->id);
                $page->setType($result->type);
                $page->setFirstPublicationDate($result->first_publication_date);
                $page->setLastPublicationDate($result->last_publication_date);
                $page->setData($result->data);
                break;
            }
        }

        return $page;
    }
}
