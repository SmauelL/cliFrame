<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/15 4:06 下午
 */

namespace CliFrame;

class Config implements ServiceInterface
{
    protected $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function __get($name)
    {
        return isset($this->config[$name]) ? $this->config[$name] : null;
    }

    public function __set($name, $value)
    {
        $this->config[$name] = $value;
    }

    public function has($name)
    {
        return isset($this->config[$name]);
    }

    public function load(App $app)
    {
        return null;
    }
}