<?php
/**
 * User: liaojiaxing
 * Date: 2020/9/24 10:33 上午
 */

namespace App\Command\Hello;

use CliFrame\CommandController;

class NameController extends CommandController
{
  public function handle()
  {
      $name = $this->hasParam('user') ? $this->getParam('user') : 'World';

      $this->getPrinter()->display(sprintf("Hello, %s!",$name));
  }
}