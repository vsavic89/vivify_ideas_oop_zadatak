<?php

abstract class Cudoviste {

    protected $health;
    protected $napadi;        
    
    public static function umanjiHealth($health)
    {
        self::$health -= $health;        
    }

    public static function generisiTipOruzja()
    {
        return rand(0, count(self::$napadi));
    } 

    public static function generisiStetu($indexNapada)
    {
        return self::$napadi[$indexNapada];
    }

    public static function getHealth()
    {
        return self::$health;
    }
}