<?php

class Pauk extends Cudoviste {
    const
        UDARAC = 5,
        UJED = 8;    

    public function __construct()
    {
        $this->napadi = [self::UDARAC, self::UJED];
    }
    
}