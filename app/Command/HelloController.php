<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/24 10:33 上午
 */

namespace App\Command;

use CliFrame\CommandController;

class HelloController extends CommandController
{
    public function run($argv)
    {
        $name = isset($argv[2]) ? $argv[2] : "World";
        $this->getApp()->getPrinter()->display("Hello $name!!!");
    }
}