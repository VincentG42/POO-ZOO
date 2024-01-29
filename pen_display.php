<?php
require_once('config/db.php');
require_once('config/autoload.php');
include_once('partials/header.php');

// var_dump($_SESSION['pen_id']);
if (isset($_POST['pen_id']) && !empty($_POST['pen_id'])){

    $_SESSION['pen_id'] = $_POST['pen_id'];
}
// instanciation des managers
$penManager = new PenManager($db);
$animalManager = new AnimalManager($db);

// recup infos enclos
$currentPen = $penManager -> hydratePen($penManager -> findPen($_SESSION['pen_id']));
$currentPen -> setZooId($_SESSION['zoo_id']);
$curreentEmployee = $_SESSION['employee'];

// a voir quand fonction $zoo-> main sera deployée
// if($currentPen instanceof Aviary){
//     $currentPen -> getRoofState();
// }
// if($currentPen instanceof Aquarium){
//     $currentPen-> getSalinity();
// }

// recup données population de l'enclos
$currentPopulationInPen = $animalManager->hydrateAllAnimals( $animalManager -> findAllAnimals($_SESSION['pen_id']), $currentPen);

var_dump($currentPen);

//insertion animal en bdd via form
if ( isset($_SESSION['pen_id']) && !empty($_SESSION['pen_id'])
&& isset($_POST['species']) && !empty($_POST['species'])
){
    $dataAnimal = [
        'pen_id' => $_SESSION['pen_id'], 
        'age' => rand (0,30),
        'height' => rand(5, 200),
        'weight' => rand(50,300),
        'is_hungry' => 0,
        'is_sick' => 0,
        'is_awake' => 1,
        'species' => $_POST['species']
    ];

    $newAnimal = $animalManager -> createAnimal($dataAnimal);

    if ($newAnimal instanceof Animal){
        $curreentEmployee ->addIntoPen($currentPen, $newAnimal );

    }
}

// enlever un animal de l'enclos
if ( isset($_POST['delete']) && !empty($_POST['delete'])){
    $curreentEmployee -> removeFromPen($_SESSION['pen_id']);
    //creer une method delete from db dans animal manager
}
//management de l'enclos
$currentPenCarac = $currentPen -> getAllCarac();

// var_dump($currentPenCarac);

?>
<div>
    <h3><?=  $currentPen -> getName()?></h3>

</div>

<!-- affichage données enclos -->
<div>
    <p> Etat de propreté : <?= $currentPenCarac['cleanliness']?></p>
    <p> Contient <?= $currentPen -> getPopulationNumber() ." ". $currentPen -> getPopulationSpecies()?></p>

</div>

<!-- management de l'enclos -->
<div>
    <!-- ajouter un animal -->
    <form action="" method ="post">

        <?php  if (!empty ($currentPenPopulationCarac)){?>
            <input type="hidden" name="species" value =<?=$currentPenPopulationCarac[0]-> getType() ?> >
        <?php } else { ?>   

        <select name="species" id="" class="form-label">
                <?php    if ($currentPen instanceof Aquarium){ ?>
                    <option value="Dolphin"> Dauphin </option>

                <?php } else if ($currentPen instanceof Aviary){ ?>
                    <option value="Eagle"> Aigle Royal </option>

                <?php } else { ?>
                    <option value="Bear"> Ours </option>
                    <option value="Tiger"> Tigre </option>
                <?php } ?>
            

        </select>
        <?php } ?>
        <input type="hidden" name="pen_id" value =<?= $_SESSION['pen_id'] ?> >

        <button type="submit" class="btn btn-primary my-3">Ajouter un animal</button>
        
        
    </form>
    <!-- supprimer un animal -->
    <form action="" method ='post'>
        <input type="hidden" name="delete">
        <button type="submit" class="btn btn-primary my-3">Enlever un animal</button>
    </form>
    <!-- nourrir les animaux -->
    <!-- nettoyer -->
</div>




<?php
include_once('partials/footer.php');
?>