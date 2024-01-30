<?php
require_once('../config/db.php');
require_once('../config/autoload.php');



$animalManager = new AnimalManager($db);
$penManager = new PenManager($db);
$employeeManager = new EmployeeManager($db);

$curreentEmployee = $_SESSION['employee'];
$currentPen = $penManager->hydratePen($penManager->findPen($_SESSION['pen_id']));



if(isset($_POST['heal']) && !empty($_POST['heal'])
    && isset($_POST['animal_id']) && !empty($_POST['animal_id'])){
        

}

// insertion en bdd
if (
    isset($_SESSION['pen_id']) && !empty($_SESSION['pen_id'])
    && isset($_POST['species']) && !empty($_POST['species'])
) {
    $dataAnimal = [
        'pen_id' => $_SESSION['pen_id'],
        'age' => rand(0, 30),
        'height' => rand(5, 200),
        'weight' => rand(50, 300),
        'is_hungry' => 0,
        'is_sick' => 0,
        'is_awake' => 1,
        'species' => $_POST['species']
    ];

    $newAnimal = $animalManager->createAnimal($dataAnimal);

    if ($newAnimal instanceof Animal) {
        $curreentEmployee->addIntoPen($currentPen, $newAnimal);
    }

    header('Location: ../pen_display.php');
}

// supprimer un animal enclos et bdd

if (isset($_POST['animal_id']) && !empty($_POST['animal_id'])) {
    $curreentEmployee->removeFromPen($currentPen);
    $animalManager ->deleteAnimal($_POST['animal_id']);
    header('Location: ../pen_display.php');
}