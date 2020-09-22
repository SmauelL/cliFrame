<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/22 5:13 下午
 */

namespace CliFrame;

class CommandRegistry
{
    protected $registry = [];

    public function registerCommand($name, $callable)
    {
        $this->registry[$name] = $callable;
    }

    public function getCommand($command)
    {
        return isset($this->registry[$command]) ? $this->registry[$command] : null;
    }
}