<?php

class IO
{
    public $input;

    public function __construct()
    {
        $this->input = fopen("php://stdin", "r");
    }

    public function __destruct()
    {
        fclose($this->input);
    }

    public function getchar($text='', $chars=1)
    {
        echo $text;
        $symbol = '';
        system('stty -icanon');
        for ($i=0; $i < $chars; $i++) $symbol .= fgetc($this->input);
        system('stty sane');
        return $symbol;
    }
    
    public function clear()
    {
        if(PHP_OS === "Windows") system("cls");
        else system("clear");
    }
}

?>