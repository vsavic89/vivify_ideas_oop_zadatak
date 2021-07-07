<?php

class Zmaj extends Cudoviste {

    private const 
        UDARAC = 5,
        BLJUJE_VATRU = 20;    

    public function __construct()
    {
        $this->napadi = [self::UDARAC, self::BLJUJE_VATRU];
    }
}