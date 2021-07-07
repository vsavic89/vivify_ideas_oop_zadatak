<?php

class GeneratorBorbe {
    private const MIN = 0;
    private const MAX = 100;
    private $log;

    public function __construct(Logovanje $log)
    {
        $this->log = $log;
    }

    public function generisiNapad()
    {
        return rand(self::MIN, self::MAX) <= 50 ? Heroj::class : Cudoviste::class;
    }

    public function napad(Heroj $heroj, Cudoviste $cudoviste)
    {        
        $napadac = $this->generisiNapad();
        ($napadac == Heroj::class) ? $zrtva = Cudoviste::class : Heroj::class;

        if($napadac == Heroj::class){            
            if ($heroj->aktivnoOruzje instanceof Mac) $steta = Mac::STETA;
            if ($heroj->aktivnoOruzje instanceof Koplje) $steta = Koplje::STETA;

            $oruzje = $heroj->aktivnoOruzje;

            $cudoviste->umanjiHealth(
                $steta
            );
        }

        if($napadac == Cudoviste::class){       
            $indexOruzja = Cudoviste::generisiTipOruzja();     
            $steta = Cudoviste::generisiStetu($indexOruzja);   
            
            $oruzje = $cudoviste->napadi[$indexOruzja];

            $heroj->umanjiHealth(
                $steta
            );            
        }


        $this->log->upisi(
            $napadac . ' je napao zrtvu ' . $zrtva . ' pomocu ' . $oruzje
        );        
    }

    public function rezultat(Heroj $heroj, Cudoviste $cudoviste)
    {
        if($heroj::getHealth() <= 0) { $this->log->upisi(Cudoviste::class . ' je pobedio u duelu sa ' . Heroj::class); }
        if($cudoviste::getHealth() <= 0) { $this->log->upisi(Heroj::class . ' je pobedio u duelu sa ' . Cudoviste::class); }
    }
}