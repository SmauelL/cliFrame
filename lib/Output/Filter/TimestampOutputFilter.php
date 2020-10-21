<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/21 11:56 上午
 */

namespace CliFrame\Output\Filter;

use CliFrame\Output\OutputFilterInterface;

class TimestampOutputFilter implements OutputFilterInterface
{
    public function filter($message, $style = null)
    {
        $datetime = new \DateTime();
        return $datetime->format('[Y-m-d H:i:s]') . $message;
    }
}