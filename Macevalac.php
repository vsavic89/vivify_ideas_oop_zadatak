<?php

class Macevalac extends Heroj {    

    private $log;

    public function __construct(Logovanje $log)
    {
        $this->health = 100;
        $this->aktivnoOruzje = null;
        $this->ranac = [];       
        $this->log = $log;
    }

    public function uzmiOruzje(Oruzje $oruzje)
    {
        try
        {
            if($oruzje instanceof Carolija){
                throw new Exception(self::class . ' nema prava za ovo oruzje: ' . Carolija::class);
            }            

            $this->ubaciOruzjeURanac($this->log, $this, $oruzje);            

        }catch(Exception $e){
            return $e->getMessage();
        }        
    }    
}