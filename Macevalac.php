<?php

class Macevalac extends Heroj {    
    
    use HerojZajednickeAkcije;    

    private $log;    

    public function __construct(Logovanje $log)
    {
        $this->health = 100;
        $this->aktivnoOruzje = null;
        $this->ranac = new Ranac();        
        $this->log = $log;
    }

    public function uzmiOruzje(Oruzje $oruzje)
    {
        try
        {
            if($oruzje instanceof Carolija){
                throw new Exception(self::class . ' nema prava za ovo oruzje: ' . get_class($oruzje));
            }            

            $this->ubaciOruzjeURanac($this->log, $oruzje);            

        }catch(Exception $e){
            $this->log->upisi($e->getMessage());
        }        
    }    
}