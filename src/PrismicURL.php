<?php

declare(strict_types=1);

namespace Prismic4D;

class PrismicURL
{
    public $url;

    function __construct($projectName, $endpoint = "/")
    {
        $this->url = 'https://' . $projectName . '.cdn.prismic.io' . $endpoint;
    }

    function __toString()
    {
        return $this->url;
    }

    function getURL()
    {
        return $this->url;
    }

    function setURL($url)
    {
        $this->url = $url;
    }

    function add_param($key, $value)
    {
        $this->url .= (strpos($this->url, '?') === false) ? '?' : '&';
        $this->url .= $key . '=' . $value;
        return $this->url;
    }
}
