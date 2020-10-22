<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/21 5:12 下午
 */

namespace CliFrame;

use CliFrame\Command\CommandCall;
use CliFrame\Command\CommandRegistry;
use CliFrame\Exception\CommandNotFoundException;
use CliFrame\Output\Filter\ColorOutputFilter;
use CliFrame\Output\OutputHandler;

class App
{
    protected $services = [];

    protected $loaded_services = [];

    protected $app_signature;

    public function __construct(array $config = [])
    {
        $config = array_merge([
            'app_path' => __DIR__ . '/../app/Command',
        ], $config);

        $this->setSignature('./minicli help');

        $this->addService('config', new Config($config));
        $this->addService('command_registry', new CommandRegistry($this->config->app_path));

        $output = new OutputHandler();
        $output->registerFilter(new ColorOutputFilter());
        $this->addService('printer', $output);
    }

    public function __get($name)
    {
        if (!array_key_exists($name, $this->services)) {
            return null;
        }

        if (!array_key_exists($name, $this->loaded_services)) {
            $this->loadService($name);
        }

        return $this->services[$name];
    }

    public function addService($name, ServiceInterface $service)
    {
        $this->services[$name] = $service;
    }

    public function loadService($name)
    {
        $this->loaded_services[$name] = $this->services[$name]->load($this);
    }

    public function getPrinter(): OutputHandler
    {
        return $this->printer;
    }

    public function setOutputHandler(OutputHandler $output_printer)
    {
        $this->services['printer'] = $output_printer;
    }

    public function getSignature()
    {
        return $this->app_signature;
    }

    public function printSignature()
    {
        $this->getPrinter()->display($this->getSignature());
    }

    public function setSignature($app_signature)
    {
        $this->app_signature = $app_signature;
    }

    public function registerCommand($name, $callable)
    {
        $this->command_registry->registerCommand($name, $callable);
    }


    public function runCommand(array $argv = [])
    {
        $input = new CommandCall($argv);
        if (count($input->args) < 2) {
            $this->printSignature();
            exit;
        }

        $controller = $this->command_registry->getCallableController($input->command, $input->subcommand);
        if ($controller instanceof ControllerInterface) {
            $controller->boot($this);
            $controller->run($input);
            $controller->teardown();
            exit;
        }
        $this->runSingle($input);
    }

    protected function runSingle(CommandCall $input)
    {

        $callable = $this->command_registry->getCallable($input->command);
        if (is_callable($callable)) {
            call_user_func($callable, $input);
            return true;
        }
        throw new CommandNotFoundException("The registered command is not a callable function.");
    }
}