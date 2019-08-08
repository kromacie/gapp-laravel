<?php

if (!function_exists('ilog')) {

    /**
     * @param null $key
     * @return \Illuminate\Foundation\Application|\Ipaas\Logger\Client|mixed|ipaas-info
     */
    function ilog($key = null)
    {
        if (is_null($key)) {
            return app('ipaas-info');
        }

        if (is_array($key)) {
            return app('ipaas-info')->put($key);
        }

        return app('ipaas-info')->get($key);
    }
}

if (!function_exists('iresponse')) {

    /**
     * @param null $key
     * @return \Illuminate\Foundation\Application|mixed|ipaas-response
     */
    function iresponse($key = null)
    {
        if (is_null($key)) {
            return app('ipaas-response');
        }

        if (is_array($key)) {
            return app('ipaas-response')->put($key);
        }

        return app('ipaas-response')->get($key);
    }
}

if (!function_exists('irequest')) {
    /**
     * @return \Ipaas\Gapp\Request
     */
    function irequest()
    {
        return new \Ipaas\Gapp\Request(request());
    }
}

if (!function_exists('irenderException')) {
    /**
     * @param Exception $e
     * @return mixed
     */
    function irenderException(Exception $e)
    {
        return iresponse()->sendError($e->getMessage(), $e->getCode());
    }
}
