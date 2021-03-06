<?php

namespace Ipaas\Gapp\Logger;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Base
 * @package Ipaas\Gapp\Logger
 */
class Base
{
    public $dataSet = [];

    /**
     * @param  array  $dataSet
     * @return $this
     */
    public function __construct(array $dataSet = [])
    {
        $this->dataSet = $dataSet;
        return $this;
    }

    /**
     * Return all data as an array
     * @return array
     */
    public function toArray()
    {
        return $this->dataSet;
    }

    /**
     * @param  Collection|Model|mixed  $data
     * @param  string  $name
     * @return Base
     */
    public function appendData($data, $name = null)
    {
        if (is_a($data, Collection::class)) {
            $data = $data->take(1000)->toArray();
        }

        if (is_a($data, Model::class)) {
            $name = $name ?? $data->getTable();
            $data = $data->toArray();
        }

        if ($name) {
            $this->dataSet[$name] = $data;
        } elseif (is_array($data)) {
            $this->dataSet += $data;
        } else {
            $this->dataSet[] = $data;
        }
        return $this;
    }
}
