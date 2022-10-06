<?php

declare(strict_types=1);

namespace pTinosq\Prismic4D;

class Page
{

    public $id;
    public $type;
    public $first_publication_date;
    public $last_publication_date;
    public $data;

    function __construct($id = null, $type = null, $first_publication_date = null, $last_publication_date = null, $data = null)
    {
        $this->id = $id;
        $this->type = $type;
        $this->first_publication_date = $first_publication_date;
        $this->last_publication_date = $last_publication_date;
        $this->data = $data;
    }

    function getID()
    {
        return $this->id;
    }

    function getType()
    {
        return $this->type;
    }

    function getFirstPublicationDate()
    {
        return $this->first_publication_date;
    }

    function getLastPublicationDate()
    {
        return $this->last_publication_date;
    }

    function getData()
    {
        return $this->data;
    }

    function get($key)
    {
        return $this->data->$key;
    }

    function setID($id)
    {
        $this->id = $id;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function setFirstPublicationDate($first_publication_date)
    {
        $this->first_publication_date = $first_publication_date;
    }

    function setLastPublicationDate($last_publication_date)
    {
        $this->last_publication_date = $last_publication_date;
    }

    function setData($data)
    {
        $this->data = $data;
    }

    function set($key, $value)
    {
        $this->data->$key = $value;
    }
}
