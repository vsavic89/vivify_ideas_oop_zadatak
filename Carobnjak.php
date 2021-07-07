<?php

class Carobnjak extends Heroj {    

    private $log;

    public function __construct(Logovanje $log)
    {
        $this->health = 150;
        $this->aktivnoOruzje = null;
        $this->ranac = [];
        $this->log = $log;
    }

    public function uzmiOruzje(Oruzje $oruzje)
    {
        try
        {
            if(($oruzje instanceof Mac) || ($oruzje instanceof Koplje)){
                throw new Exception(self::class . ' nema prava za ovo oruzje: ' . Mac::class);
            }

            $this->ubaciOruzjeURanac($this->log, $this, $oruzje);            
            
        }catch(Exception $e){
            return $e->getMessage();
        }

    }
}