<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/21 5:12 下午
 */

namespace CliFrame;

class App
{
    protected $printer;

    protected $command_registry;

    public function __construct()
    {
        $this->printer = new CliPrinter();
        $this->command_registry = new CommandRegistry();
    }

    public function getPrinter()
    {
        return $this->printer;
    }

    public function registerCommand($name, $callable)
    {
        $this->command_registry->registerCommand($name, $callable);
    }


    public function runCommand(array $argv)
    {
        $command_name = "help";

        if (isset($argv[1])) {
            $command_name = $argv[1];
        }

        $command = $this->command_registry->getCommand($command_name);
        if ($command == null) {
            $this->getPrinter()->display("ERROR: Command \"$command_name\" not found.");
            exit;
        }

        call_user_func($command, $argv);
    }
}