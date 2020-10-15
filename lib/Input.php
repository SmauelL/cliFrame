<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/15 4:11 下午
 */

namespace CliFrame;

class Input
{
    protected $input_history = [];

    protected $prompt;

    public function __construct($prompt = 'cliFrame$> ')
    {
        $this->setPrompt($prompt);
    }

    public function read()
    {
        $input = readline($this->getPrompt());
        $this->input_history[] = $input;

        return $input;
    }

    public function getInputHistory()
    {
        return $this->input_history;
    }

    public function getPrompt()
    {
        return $this->prompt;
    }

    public function setPrompt(string $prompt)
    {
        $this->prompt = $prompt;
    }
}