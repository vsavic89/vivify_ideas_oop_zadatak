<?php

abstract class Heroj {
    public abstract function uzmiOruzje(Oruzje $oruzje);    
    public abstract function __construct(Logovanje $log);    

    protected $ranac;
    protected $aktivnoOruzje;
    protected $health;    

    public static function ubaciOruzjeURanac(Logovanje $log, Heroj $heroj, Oruzje $oruzje)
    {
        try 
        {
            if(count(self::$ranac) < self::$ranac->getMaxBrojOruzja()){
                throw new Exception('Ne moze vise oruzja u ranac.');
            }

            array_push(self::$ranac, $oruzje);  
        
            $log->upisi(
                get_class($heroj) . ' je pokupio oruzje: ' . get_class($oruzje)
            );
        
        }catch(Exception $e){
            return $e->getMessage();
        }
    }    

    public static function umanjiHealth($health)
    {
        self::$health -= $health;        
    }

    public static function getHealth()
    {
        return self::$health;
    }    

    public static function baciOruzje(Oruzje $oruzje)
    {
        for($i = 0; $i < count(self::$ranac); $i++){
            if(get_class(self::$ranac[$i]) == get_class($oruzje)){
                array_splice(
                    self::$ranac,
                    $i,
                    1
                );
            }
        }

        self::promeniOruzje();
    }

    public static function promeniOruzje()
    {
        try
        {
            if(count(self::$ranac) == 0){
                throw new Exception('NoWeapon');
            }
            
            for($i = 0; $i < count(self::$ranac); $i++){                
                self::$aktivnoOruzje = self::$ranac[$i];
                break;
            }

            return self::$aktivnoOruzje;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

}