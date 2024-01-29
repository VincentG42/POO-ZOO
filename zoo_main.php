<?php
require_once('config/db.php');
require_once('config/autoload.php');
include_once('partials/header.php');


// var_dump($_POST);

// creation des managers
$zooManager = new ZooManager($db);
$employeeManager = new EmployeeManager($db);
$penManager = new PenManager($db);

//stockage id zoo dans session
if(isset($_POST['zoo_id']) && !empty($_POST['zoo_id'])){

    $_SESSION['zoo_id'] =$_POST['zoo_id'];
}
 // recuperation des infos du zoo
$currentZoo =$zooManager -> hydrateZoo( $zooManager -> findZoo($_SESSION['zoo_id']));

//recuperation des infos de l'employe

$currentEmployee = $employeeManager-> hydrateEmployee ($employeeManager -> findEmployee( $currentZoo -> getId()));

//initialisation des infos manquantes
$currentEmployee -> setID($employeeManager ->findEmployee($currentZoo -> getId())['id']);
$currentZoo ->setEmployee($currentEmployee ->getId());
$currentEmployee -> setZooId($currentZoo-> getID());

//stockages objets employe et zoo dans session (a voir si utlité)
$_SESSION['zoo'] = $currentZoo;
$_SESSION['employee'] = $currentEmployee;
// var_dump($currentZoo);
// var_dump ($currentEmployee);
// var_dump($_SESSION);

// creation enclos en bdd

if(isset($_POST['pen_name']) && !empty($_POST['pen_name'])
&& isset($_POST['type']) && !empty($_POST['type']) ){
    $data =[
        'zoo_id' => $currentZoo -> getId(), 
            'name' => $_POST['pen_name'], 
            'cleanliness' =>  $_POST['cleanliness'],
            'type' => $_POST['type'],
            'population_number' => intval($_POST['population_number']),
            'population_species' => $_POST['population_species']
    ];
    if( $penManager -> checkNumberPens($data) < 6 ){

        $penManager -> createPen($data);
    } else {
    echo "Il y a deja 6 enclos, impossible d'en créer un nouveau" ;
    }
}

// recuperation des enclos existants

$currentZooPenlist = $penManager -> hydratePens( $penManager -> findAllPens($_SESSION['zoo_id']));

// var_dump($currentZooPenlist)


?>

<!-- ------------------------------------------------------------------------------------------- -->

<div class="container mt-3">
    <h2> Bienvenue à <?= ucfirst($currentZoo -> getName()) ?></h2>
    <h3> <?=ucfirst( $currentEmployee -> getName())?>, à votre service !!</h3>

    <!-- form creation enclos -->
    <div id="create_pen" class="row justify-content-center align-items-center text-center m-4">
            <form action="" method="post" class= " col-4 my-2">

                <label for="pen_name" class="form-label"> Nom de l'enclos : </label>
                <input type="text" class="form-control" id="pen_name" name ="pen_name">

                <select name="type" id="" class="form-label">
                
                    <option value="Pen"> Enclos terrestre </option>
                    <option value="Aquarium"> Aquarium </option>
                    <option value="Aviary"> Volière </option>

                </select>
                <input type="hidden" name="cleanliness" value ="bonne">
                <input type="hidden" name="population_species" value ="à définir">
                <input type="hidden" name="population_number" value =0>

                <button type="submit" class="btn btn-primary my-3">Créez un enclos</button>

            </form>

    </div>
    <!-- form suppression enclos -->
    <!-- form modification type enclos -->

    <!-- affichage liste enclos -->
    <div id="pen_list">
        <?php foreach($currentZooPenlist as $currentZooPen){ 
            $penCarac = $currentZooPen ->getAllCarac() ?> 
            <div class="pen_card">
                <h4> <?= $penCarac['name'] ?> </h4>
                <p> Enclos de type : <?= $currentZooPen ->gettype() ?></p>
                <p> Etat de propreté : <?= $penCarac['cleanliness'] ?></p>
                <p> Contient :<?= $penCarac['populationNumber']." ".$penCarac['populationSpecies']."(s)"  ?></p>

                <form action="pen_display.php" method ="post">
                    <input type="hidden" name="pen_id" value ="<?= $currentZooPen ->getId()?>">
                    <button type="submit" class="btn btn-primary my-3">Visiter l'enclos</button>

                </form>

            </div>
        <?php } ?>

    </div>

</div>







<?php
include_once('partials/footer.php');


?>