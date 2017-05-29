<?php

namespace Modules\Oms\Http\Controllers;

class MMConfig
{
    protected $config;
    protected $defaultEnv = 'sandbox';
    protected $timeout = 20;
    protected $decodeAsArray = false;

    /**
     * Set environment (sandbox|prod).
     *
     * @param string $env
     */
    public function setEnv($env = null)
    {
        $defaultConfig = \Config::get('global');

        if (empty($defaultConfig[$env])) {
            $this->config = $defaultConfig[$this->defaultEnv];
        } else {
            $this->config = $defaultConfig[$env];
        }
    }

    /**
     *
     * @return array config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set response as array.
     *
     * @param bool
     */
    public function setDecodeAsArray($value)
    {
        $this->decodeAsArray = (bool)$value;
    }

    /**
     * Set the connection and response timeouts.
     *
     * @param int $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = (int)$timeout;
    }
}
