<?php
        $train = new Train();
        $router = new Router();
        $routeId = (int)$router->get_id_url();
        $trainId = $train->getTrainById($routeId)['trainId'];
        $trainList = $train->getTrainByRouteId($trainId) ?? [];
        $nameTrajet = null;
        $route = new Route();
        $nameTrajet = $route->getRouteById($routeId) ?? null;
        $placeOfDeparture = $nameTrajet["placeOfDeparture"] ?? null;
        $placeOfArrival = $nameTrajet["placeOfArrival"] ?? null;
?>
<br><br>
<h1 style="display: inline-block;">Liste des Trains de <?php echo $placeOfDeparture;?> à <?php echo $placeOfArrival;?></h1>
<a href="/Ticket/Admin/Reservation" class="btn-back"></a>
<button class="btn" style="float: right;" onclick="Train.openBoxTrain('#trainView', <?php echo $routeId;?>)">Ajouter</button>
<br>
<br>
<hr style="border: 1px solid gray;width: 100%;">
<br>
<div class="center">
    <?php
        if ($trainList):
    ?>
    <table>
        <thead>
            <tr>
                <th>Nom du train</th>
                <th>Capacité de train</th>
                <th>Place occuper</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($trainList as $key => $value):
            ?>
            <tr>
                <td><?php echo $value['nameTrain'];?></td>
                <td><?php echo $value['CapacityTrain'];?></td>
                <td><?php echo 5;?></td>
                <td>
                    <button onclick="Train.openBoxTrain('#dialog', <?php echo $value['trainId'];?>)" type="button" class="btn-action">
                        <img src="/images/trash-dark.png" alt="delete" class="icon-action">
                    </button>
                    <button onclick="Train.openBoxTrain('#trainView', '<?php echo $value['trainId'];?>', true)" type="button" class="btn-action">
                        <img src="/images/edit-dark.png" alt="edit" class="icon-action">
                    </button>
                    <button type="button" class="btn-action">
                        <a href="/Ticket/Admin/R/<?= $routeId;?>/T/<?php echo $value['trainId'];?>">
                            <img src="/images/appointment.png" alt="edit" class="icon-action">
                        </a>
                    </button>
                </td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
    <?php
        else:
        echo "Il n'y a pas de train libre libre pour le moment!";
    ?>
    <?php
        endif;
    ?>
    <div class="fullscreen center" id="dialog" style="display: none;">
        <div class="card center" style="width: 300px;margin: 15px auto;">
            <h3>Voulez vous confirmer la suppression ?</h3> 
            <button class="btn" style="margin: 5px" id="confirmation" onclick="Train.deleteDataTrain(document.getElementById('dialog'))">Oui</button>
            <button class="btn" style="margin: 5px" onclick="cancelDelete()">Non</button>
            <br>
        </div>
    </div>
    <div class="fullscreen center" id="trainView" style="display: none;">
        <?php include_once '../app/Views/Admin/TrainView.php';?>
    </div>
</div>