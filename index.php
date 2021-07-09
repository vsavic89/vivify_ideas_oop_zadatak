<?php

include('./HerojZajednickeAkcije.php');
include('./Oruzje.php');
include('./Heroj.php');
include('./Ranac.php');
include('./Logovanje.php');
include('./Mac.php');
include('./Koplje.php');
include('./Carolija.php');
include('./Macevalac.php');
include('./Carobnjak.php');

$log = Logovanje::getInstance();

$mac = new Mac();
$koplje = new Koplje();

$mac2 = new Mac();
$koplje2 = new Koplje();

$carolija = new Carolija();

$macevalac = new Macevalac($log);
$macevalac->uzmiOruzje($carolija);
$macevalac->uzmiOruzje($mac);
$macevalac->uzmiOruzje($koplje);
$macevalac->uzmiOruzje($mac2);
$macevalac->uzmiOruzje($koplje2);

$log->otvori();

