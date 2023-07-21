<?php

class Menu
{
    private array $list;
    private string $text;

    public function __construct()
    {
        $this->list = [];
    }

    public function addItems(array $items)
    {
        foreach($items as &$item) $this->list[] = $item;
        return $this->list;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function write()
    {
        $IO = new IO;
        $choice = 0;
        while(true)
        {
            $IO->clear();
            print($this->text . "\n\n");
            for($i=0;$i < count($this->list);$i++)
            {
                print($this->list[$i]);
                if($i === $choice) print(" <<");
                print("\n");
            }
            
            $char = $IO->getchar();
            switch($char)
            {
                case "w":
                    if($choice > 0) $choice--;
                break;

                case "s":
                    if($choice < count($this->list)-1) $choice++;
                break;

                case "\n":
                    return $choice;
                break;
            }
        }
    }

}



?>