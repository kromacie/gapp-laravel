<?php

namespace Ipaas\Gapp\Logger;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;

/**
 * Class Client
 * @package Ipaas\Gapp\Logger
 */
class Client extends Base
{
    /**
     * @param $key
     * @return |null
     */
    public function __get($key)
    {
        return ilog()->dataSet[$key] ?? null;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return ilog()->dataSet['client_id'] ?? 'Unknown';
    }

    /**
     * @return string
     */
    public function getClientKey(): string
    {
        return ilog()->dataSet['client_key'] ?? 'Unknown';
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return ilog()->dataSet['request_id'] ?? 'Unknown';
    }

    /**
     * @param mixed $value
     * @param string|null $name
     * @return Client
     */
    public function setData($value, $name = null): Client
    {
        parent::appendData($value, $name);
        return $this;
    }

    /**
     * @param string
     * @return Client
     */
    public function setClientId(string $client = null): Client
    {
        $value = $client ?? 'Unknown';
        return $this->setData($value, 'client_id');
    }

    /**
     * @param string
     * @return Client
     */
    public function setClientKey(string $value = null): Client
    {
        $value = $value ?? 'Unknown';
        return $this->setData($value, 'client_key');
    }

    /**
     * @param string
     * @return Client
     */
    public function setRequestId(string $value = null): Client
    {
        $value = $value ?? 'Unknown';
        return $this->setData($value, 'request_id');
    }

    /**
     * @param string
     * @return Client
     */
    public function setType(string $value): Client
    {
        return $this->setData($value, 'type');
    }

    /**
     * @param string|Carbon $value
     * @param string $name
     * @return Client
     * @throws Exception
     */
    public function setDate($value, string $name): Client
    {
        /**
         * @type Carbon $value
         */
        if (!is_a($value, Carbon::class)) {
            try {
                $value = Carbon::parse($value);
            } catch (Exception $e) {
                throw $e;
            }
        }
        return $this->setData($value->format('c'), $name);
    }

    /**
     * @param string|Carbon $value
     * @return Client
     * @throws Exception
     */
    public function setDateFrom($value = null): Client
    {
        $value = $value ?? Carbon::now();
        return $this->setDate($value, 'date_from');
    }

    /**
     * @param string|Carbon $value
     * @return Client
     * @throws Exception
     */
    public function setDateTo($value = null): Client
    {
        $value = $value ?? Carbon::now();
        return $this->setDate($value, 'date_to');
    }

    /**
     * @param string
     * @return Client
     */
    public function setUuid(string $value = null): Client
    {
        $value = $value ?? Str::uuid();
        return $this->setData($value, 'uuid');
    }
}
