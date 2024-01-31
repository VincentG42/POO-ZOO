<?php
require_once('../config/db.php');
require_once('../config/autoload.php');



$animalManager = new AnimalManager($db);
$penManager = new PenManager($db);
$employeeManager = new EmployeeManager($db);


// creation enclos en bdd

if(isset($_POST['pen_name']) && !empty($_POST['pen_name'])
&& isset($_POST['type']) && !empty($_POST['type']) ){
    $data =[
            'zoo_id' => $_SESSION['zoo']-> getId(), 
            'name' => $_POST['pen_name'], 
            'cleanliness' =>  $_POST['cleanliness'],
            'type' => $_POST['type'],
            'population_number' => intval($_POST['population_number']),
            'population_species' => $_POST['population_species']
        ];
        if( $penManager -> checkNumberPens($data) < 6 ){
            
            $penManager -> createPen($data);
            $id = $db -> lastInsertId();

            $newPen =  $penManager ->hydratePen($penManager ->findPen($id));
            $_SESSION['zoo'] -> setPens($newPen);
            var_dump($newPen);

        } else {
            echo "Il y a deja 6 enclos, impossible d'en créer un nouveau" ;
        }
        header('Location: ../zoo_main.php');
    }
    

//suprression enclos en bdd
if (isset($_POST['pen_to_delete']) && !empty($_POST['pen_to_delete'])){
    var_dump($_POST);
    $checkAnimalsInPen  =$penManager->findPen($_POST['pen_to_delete']);
    $check =$penManager->hydratePen($checkAnimalsInPen);
            
    var_dump($checkAnimalsInPen);

    if($check ->getPopulationNumber() === 0)
    {
        $penManager->deletePen($_POST['pen_to_delete']);
    } 
    header('Location: ../zoo_main.php');

}

//maj Pen
if (isset($_POST['maj_pen']) && !empty($_POST['maj_pen'])){

$penManager -> penModicification($_SESSION['penObject']);
$_SESSION['penObject'] ="";
header('Location: ../zoo_main.php');

}
?>