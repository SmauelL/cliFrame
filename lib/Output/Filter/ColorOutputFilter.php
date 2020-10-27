<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/21 11:41 上午
 */

namespace CliFrame\Output\Filter;

use CliFrame\Output\CLITheme;
use CliFrame\Output\OutputFilterInterface;

class ColorOutputFilter implements OutputFilterInterface
{
    protected $theme;

    public function __construct(CLITheme $theme = null)
    {
        $this->theme = $theme ?? new CLITheme();
    }

    public function getTheme(): CLITheme
    {
        return $this->theme;
    }

    public function setTheme(CLITheme $theme): void
    {
        $this->theme = $theme;
    }

    public function filter($message, $style = null): string
    {
        return $this->format($message, $style);
    }

    public function format($message, $style = "default"): string
    {
        $style_colors = $this->theme->getStyle($style);

        $bg = '';
        if (isset($style_colors[1])) {
            $bg = ';' . $style_colors[1];
        }

        return sprintf("\e[%s%sm%s\e[0m", $style_colors[0], $bg, $message);
    }
}