<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/26 6:04 下午
 */

namespace App\Command\Help;

use CliFrame\Command\CommandController;
use CliFrame\Output\Filter\ColorOutputFilter;
use CliFrame\Output\Helper\TableHelper;

class TableController extends CommandController
{
    public function handle()
    {
        $this->getPrinter()->display('Testing Tables');

        table = new TableHelper();
        $table->addHeader(['Header 1','Header 2','Header 3']);

        for ($i = 1;$i <= 10; $i++){
            $table->addRow([$i,rand(0,10),"other string $i"]);
        }

        $this->getPrinter()->newline();
        $this->getPrinter()->rawOutput($table->getFormattedTable(new ColorOutputFilter()));
        $this->getPrinter()->newline();
    }
}