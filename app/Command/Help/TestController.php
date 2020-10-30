<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/27 10:23 上午
 */

namespace App\Command\Help;

use CliFrame\Command\CommandController;


class TestController extends CommandController
{
    public function handle()
    {
        $name = $this->hasParam('user') ? $this->getParam('user') : 'World';
        $this->getPrinter()->display(sprintf("Hello,%s!", $name));

        print_r($this->getParams());
    }
}