<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/24 10:31 上午
 */

namespace CliFrame;

abstract class CommandController
{
    protected $app;

    protected $input;

    abstract public function handle();

    public function boot(App $app)
    {
        $this->app = $app;
    }

    public function run(CommandCall $input)
    {
        $this->input = $input;
        $this->handle();
    }

    public function teardown()
    {
        //
    }

    protected function getArgs()
    {
        return $this->input->args;
    }

    protected function getParams()
    {
        return $this->input->params;
    }

    protected function hasParam($param)
    {
        return $this->input->hasParam($param);
    }

    protected function getParam($param)
    {
        return $this->input->getParam($param);
    }

    protected function getApp()
    {
        return $this->app;
    }

    protected function getPrinter()
    {
        return $this->getApp()->getPrinter();
    }
}