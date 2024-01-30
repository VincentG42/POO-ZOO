<?php
require_once('config/db.php');
require_once('config/autoload.php');
include_once('partials/header.php');

// var_dump($_SESSION['pen_id']);
if (isset($_POST['pen_id']) && !empty($_POST['pen_id'])) {

    $_SESSION['pen_id'] = $_POST['pen_id'];
}


// instanciation des managers
$penManager = new PenManager($db);
$animalManager = new AnimalManager($db);

// recup infos enclos
$currentPen = $penManager->hydratePen($penManager->findPen($_SESSION['pen_id']));
$currentPen->setZooId($_SESSION['zoo_id']);
$curreentEmployee = $_SESSION['employee'];

// a voir quand fonction $zoo-> main sera deployée
// if($currentPen instanceof Aviary){
//     $currentPen -> getRoofState();
// }
// if($currentPen instanceof Aquarium){
//     $currentPen-> getSalinity();
// }

// recup données population de l'enclos
$currentPopulationInPen = $animalManager->hydrateAllAnimals($animalManager->findAllAnimals($_SESSION['pen_id']), $currentPen);

// var_dump($currentPen);

//insertion animal en bdd via form


//management de l'enclos
$currentPenCarac = $currentPen->getAllCarac();

// var_dump($currentPenCarac);

?>


<!-- ------------------------------------------------------------------------------------------- -->
<a href="zoo_main.php" class="getback_link"><button class="btn btn-success">Revenir au zoo </button> </a>

<div class="<?= strtolower($currentPen->getPopulationSpecies())?>">


    <div class="to_bggradient row flex-column justify-content-center align-items-center ps-3">

        <h3><?= ucfirst($currentPen->getName()) ?></h3>
        
        <!-- affichage données enclos -->
        <div class="pen_data ">
            <p> Etat de propreté : <?= $currentPenCarac['cleanliness'] ?></p>
            <p> Contient <?= $currentPen->getPopulationNumber() . " " . $currentPen->getPopulationSpecies() ?>(s)</p>
            <div>
                
                <?php foreach ($currentPen->getPopulation() as $animal) {
                    $randomAction = [$animal->move(), $animal->cry()] ?>
                    <p> <?= $randomAction[rand(0, 1)] ?></p>
                    <?php if ($animal->getIsAwake() === false) { ?>
                        <p> est malade !
                            <form action="./process/manage_animal.php" method='post'>
                                <input type="hidden" name="heal" value="heal">
                                <input type='hidden' name="animal_id" value='<?= $animal->getId() ?>'>
                                <button type="submit"> Soignez-le </button>
                            </form>
                        </p>
                        <?php } ?>
                        <?php if ($animal->getIsAwake() === false) { ?>
                            <p> dort !
                        <form action="./process/manage_animal.php" method='post'>
                            <input type="hidden" name="wake_up" value="wake_up">
                            <input type='hidden' name="animal_id" value='<?= $animal->getId() ?>'>
                            <button type="submit"> Reveillez-le </button>
                        </form>
                    </p>
                    <?php } ?>
                    <?php if ($animal->getIshungry() === true) { ?>
                        <p> a faim !
                            <form action="./process/manage_animal.php" method='post'>
                                <input type="hidden" name="meat" value="heal">
                            <input type='hidden' name="animal_id" value='<?= $animal->getId() ?>'>
                            <button type="submit"> Nourrissez-le </button>
                        </form>
                    </p>
                    <?php } ?>
                    <form action="./process/manage_animal.php" method="post">
                        <input type="hidden" name="animal_id" value='<?= $animal->getId() ?>'>
                        <button type="submit" class="btn btn-danger"> X </button>
                    </form>
                <?php } ?>
                    
            </div>
        </div>
        
        <!-- management de l'enclos -->
        <div>
            <!-- ajouter un animal -->
            <form action="./process/manage_animal.php" method="post">
                
                <?php if ($currentPen->getPopulationSpecies() != 'à définir') { ?>
                    <input type="hidden" name="species" value=<?= $currentPen->getPopulationSpecies() ?>>
                    <?php } else { ?>
                        
                    <select name="species" id="" class="form-label">
                        <?php if ($currentPen instanceof Aquarium) { ?>
                            <option value="Dolphin"> Dauphin </option>
                            
                            <?php } else if ($currentPen instanceof Aviary) { ?>
                                <option value="Eagle"> Aigle Royal </option>

                                <?php } else { ?>
                                    <option value="Bear"> Ours </option>
                                    <option value="Tiger"> Tigre </option>
                                    <?php } ?>
                                    
                                    
                                </select>
                                <?php } ?>
                                <input type="hidden" name="pen_id" value=<?= $_SESSION['pen_id'] ?>>
                                
                                <button type="submit" class="btn btn-success my-3">Ajouter un animal</button>
                                
                            </form>

                            <!-- supprimer un animal -->
                            <form action="" method='post'>
                <input type="hidden" name="delete">
                <button type="submit" class="btn btn-success my-3">Enlever un animal</button>
            </form>
            <!-- nourrir les animaux -->
            <!-- nettoyer -->
        </div>
    </div>
</div>




<?php
include_once('partials/footer.php');
?>