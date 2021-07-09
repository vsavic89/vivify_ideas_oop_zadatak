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
    
    public function getOruzja()
    {
        return $this->oruzja;
    }

    public function dodajOruzje(Oruzje $oruzje)
    {
        array_push($this->oruzja, $oruzje);
    }
}