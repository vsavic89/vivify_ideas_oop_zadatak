<?php

class Ranac {

    private $oruzja;
    private $maxBrojOruzja;    
    
    public function __construct()
    {
        $this->oruzja = [];
        $this->maxBrojOruzja = 2;
    }

    public function getMaxBrojOruzja()
    {
        return $this->maxBrojOruzja;
    }
}