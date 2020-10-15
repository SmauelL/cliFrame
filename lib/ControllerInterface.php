<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/15 4:04 下午
 */

namespace CliFrame;

use CliFrame\Command\CommandCall;

interface ControllerInterface
{
    public function boot(App $app);

    public function run(CommandCall $input);

    public function teardown();
}