<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/16 5:22 下午
 */

namespace CliFrame\Output;

interface OutputFilterInterface
{
    public function filter($message, $style = null);
}