<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/23 4:35 下午
 */

namespace App\Command\Help;

use CliFrame\App;
use CliFrame\Command\CommandController;

class DefaultController extends CommandController
{
    protected $command_map = [];

    public function boot(App $app)
    {
        parent::boot($app);
        $this->command_map = $app->command_registry->getCommandMap();
    }

    public function handle()
    {
        $this->getPrinter()->info('Available Commands');

        foreach ($this->command_map as $command => $sub){

            $this->getPrinter()->newline();
            $this->getPrinter()->out($command,'info_alt');

            if(is_array($sub)){
                foreach ($sub as $subcommand){
                    if($subcommand !== 'default'){
                        $this->getPrinter()->newline();
                        $this->getPrinter()->out(sprintf('%s%s','└──',$subcommand));
                    }
                }
            }
            $this->getPrinter()->newline();
        }

        $this->getPrinter()->newline();
        $this->getPrinter()->newline();
    }
}