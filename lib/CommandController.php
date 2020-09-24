<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/24 10:31 上午
 */

namespace CliFrame;

abstract class CommandController
{
    protected $app;

    abstract public function run($argv);

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    protected function getApp()
    {
        return $this->app;
    }
}