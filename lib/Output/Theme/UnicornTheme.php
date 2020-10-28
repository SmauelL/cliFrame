<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/28 9:56 上午
 */

namespace CliFrame\Output\Theme;

use CliFrame\Output\CLITheme;
use CliFrame\Output\CLIColors;

class UnicornTheme extends CLITheme
{
    public function getDefaultColors()
    {
        return [
            'default'     => [ CLIColors::$FG_CYAN ],
            'alt'         => [ CLIColors::$FG_BLACK, CLIColors::$BG_CYAN ],
            'error'       => [ CLIColors::$FG_RED ],
            'error_alt'   => [ CLIColors::$FG_CYAN, CLIColors::$BG_RED ],
            'success'     => [ CliColors::$FG_GREEN ],
            'success_alt' => [ CLIColors::$FG_BLACK, CLIColors::$BG_GREEN ],
            'info'        => [ CLIColors::$FG_MAGENTA],
            'info_alt'    => [ CLIColors::$FG_WHITE, CLIColors::$BG_MAGENTA ]
        ];
    }
}