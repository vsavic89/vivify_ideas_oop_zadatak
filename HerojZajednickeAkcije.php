<?php

trait HerojZajednickeAkcije {
    public function ubaciOruzjeURanac(Logovanje $log, Oruzje $oruzje)
    {            
        try 
        {
            if(count($this->ranac->getOruzja()) >= $this->ranac->getMaxBrojOruzja()){                
                throw new Exception('Ne moze vise oruzja u ranac.');
            }            
            
            $this->ranac->dodajOruzje($oruzje);                            

            $log->upisi(
                get_class($this) . ' je pokupio oruzje: ' . get_class($oruzje)
            );
        
        }catch(Exception $e){
            $log->upisi($e->getMessage());
        }
    } 

    public function umanjiHealth($health)
    {
        $this->$health -= $health;        
    }

    public function getHealth()
    {
        return $this->health;
    }    

    public function baciOruzje(Oruzje $oruzje)
    {
        for($i = 0; $i < count($this->ranac); $i++){
            if(get_class($this->ranac[$i]) == get_class($oruzje)){
                array_splice(
                    $this->ranac,
                    $i,
                    1
                );
            }
        }

        $this->promeniOruzje();
    }

    public function promeniOruzje()
    {
        try
        {
            if(count($this->ranac) == 0){
                throw new Exception('NoWeapon');
            }
            
            for($i = 0; $i < count($this->ranac->getOruzja()); $i++){                
                $this->aktivnoOruzje = $this->ranac[$i];
                break;
            }

            return $this->aktivnoOruzje;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}