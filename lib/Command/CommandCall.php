<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/30 3:00 下午
 */

namespace CliFrame\Command;

class CommandCall
{
    public $command;

    public $subcommand;

    public $args = [];

    public $raw_args = [];

    public $params = [];

    public $flags = [];

    public function __construct(array $argv)
    {
        $this->raw_args = $argv;
        $this->parseCommand($argv);

        $this->command = isset($this->args[1]) ? $this->args[1] : null;

        $this->subcommand = isset($this->args[2]) ? $this->args[2] : 'default';
    }

    protected function parseCommand($argv)
    {
        foreach ($argv as $arg) {
            $pair = explode('=', $arg);

            if (count($pair) == 2) {
                $this->params[$pair[0] = $pair[1]];
                continue;
            }

            if (substr($arg, 0, 2) == '--') {
                $this->flags[] = $arg;
                continue;
            }

            $this->args[] = $arg;
        }
    }

    public function hasParam($param)
    {
        return isset($this->params[$param]);
    }

    public function hasFlag($flag)
    {
        return in_array($flag,$this->flags);
    }

    public function getParam($param)
    {
        return $this->hasParam($param) ? $this->params[$param] : null;
    }

    public function getRawArgs()
    {
        return $this->raw_args;
    }

    public function getFlags()
    {
        return $this->flags;
    }
}