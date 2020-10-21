<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/21 11:53 上午
 */

namespace CliFrame\Output\Filter;

use CliFrame\Output\OutputFilterInterface;

class SimpleOutputFilter implements OutputFilterInterface
{
    public function filter($message, $style = null)
    {
        return $message;
    }
}