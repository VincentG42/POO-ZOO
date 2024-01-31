<?php
require_once('../config/db.php');
require_once('../config/autoload.php');


$animalManager = new AnimalManager($db);
$penManager = new PenManager($db);
$employeeManager = new EmployeeManager($db);


if (isset($_POST['main']) && !empty($_POST['main'])){
    $_SESSION['zoo'] -> main();
    foreach($_SESSION['zoo'] ->getPens() as $pen){
        $penManager -> penModicification($pen);
        foreach ($pen -> getPopulation() as $animal){
            $animalManager -> animalStateUpdate($animal);
        }
    }
    header('Location: ../zoo_main.php');
    
}





?>