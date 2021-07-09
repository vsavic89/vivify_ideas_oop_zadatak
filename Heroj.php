<?php

abstract class Heroj {
    public abstract function uzmiOruzje(Oruzje $oruzje);    
    public abstract function __construct(Logovanje $log);    

    protected $ranac;
    protected $aktivnoOruzje;
    protected $health;
}