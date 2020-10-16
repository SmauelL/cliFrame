<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/16 5:29 下午
 */

namespace CliFrame\Output\Adapter;

use CliFrame\Output\PrinterAdapterInterface;

class DefaultPrinterAdapter implements PrinterAdapterInterface
{
    public function out($message)
    {
        echo $message;
    }
}