<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/20 5:51 下午
 */

namespace CliFrame\Output\Adapter;

use CliFrame\Output\PrinterAdapterInterface;

class FilePrinterAdapter implements PrinterAdapterInterface
{
    protected $output_file;

    public function __construct($output_file)
    {
        $this->output_file = $output_file;
    }

    public function out($message, $style = null)
    {
        $fp = fopen($this->output_file, "a+");
        fwrite($fp, $message);
        fclose($fp);

        return $message;
    }
}