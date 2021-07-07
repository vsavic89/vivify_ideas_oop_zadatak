<?php

class Logovanje
{
    private static $instances = [];
    protected function __construct() { }
    
    public static function getInstance(): Logovanje
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }     

    public function upisi($tekst)
    {
        $fp = fopen('log.txt', 'a');
        fwrite($fp, $tekst);       
        fclose($fp);  
    }

    public function otvori()
    {
        return file_get_contents("log.txt");
    }
}