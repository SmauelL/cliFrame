<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/21 5:25 下午
 */

namespace CliFrame;
class CliPrinter{
    public function out($message)
    {
        echo $message;
    }

    public function newline()
    {
        $this->out("\n");
    }

    public function display($message)
    {
        $this->newline();
        $this->out($message);
        $this->newline();
        $this->newline();
    }
}