<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/21 5:12 下午
 */

namespace CliFrame;

class App
{
    public function runCommand(array $argv)
    {
        $name = "World";
        if (isset($argv[1])){
            $name = $argv[1];
        }
        echo "Hello $name!!!\n";
    }
}