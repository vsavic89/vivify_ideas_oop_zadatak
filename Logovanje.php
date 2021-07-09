<?php

class Logovanje
{
    private static $instances = [];    
    
    public static function getInstance(): Logovanje
    {
        unlink('log.txt');

        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }     

    public function upisi($tekst)
    {        
        $fp = fopen('log.txt', 'a');
        fwrite(
            $fp, 
            date('Y-m-d') . ' ' . date('H:i:s') . ' | ' . $tekst . PHP_EOL
        );       
        fclose($fp);  
    }

    public function otvori()
    {
        echo str_replace(PHP_EOL, '<br/>', file_get_contents("log.txt"));
    }
}