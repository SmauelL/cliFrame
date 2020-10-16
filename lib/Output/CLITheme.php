<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/16 3:14 下午
 */

namespace CliFrame\Output;

class CLITheme implements CLIThemeInterface
{
    public $styles = [];

    public function __construct()
    {
        $this->styles = $this->getDefaultColors();
    }

    public function getStyle($style_name)
    {
        return $this->styles[$style_name] ?? $this->styles['default'];
    }

    public function getDefaultColors()
    {
        return [
            'default' => [CLIColors::$FG_WHITE],
            'alt' => [CLIColors::$FG_BLACK, CLIColors::$BG_WHITE],
            'error' => [CLIColors::$FG_RED],
            'error_alt' => [CLIColors::$FG_WHITE, CLIColors::$BG_RED],
            'success' => [CLIColors::$FG_GREEN],
            'success_alt' => [CLIColors::$FG_WHITE, CLIColors::$BG_GREEN],
            'info' => [CLIColors::$FG_CYAN],
            'info_alt' => [CLIColors::$FG_WHITE, CLIColors::$BG_CYAN]
        ];
    }

    public function setStyle($name, array $style)
    {
        $this->styles[$name] = $style;
    }
}