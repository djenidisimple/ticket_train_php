<?php
    $train = new Train();
    $router = new Router();
    $id = $router->get_id_url_array();
    $routeId = $id[0];
    $trainId = $id[1];
    $nameTrain = $train->getNameTrainById($trainId);
?>
<br><br>
<h1>Réservation de place dans le train  <b><?php echo $nameTrain["nameTrain"] ?? null;?></b></h1>
<!-- <a href="/Ticket/Admin/R/<?php echo $_SESSION["routeID"];?> " class="btn-back"></a> -->
<hr style="border: 1px solid gray;width: 100%;">
<br>
<button class='btn' onclick="Place.openBoxPlace('#placeView')">Réserver</button>
<br><br>
<!-- /Ticket/Admin/T/<?php echo $_SESSION["trainID"];?> -->
<form action="" method="post">
    <h2>Place choisie : <span id="listSeat"></span></h2>
    <br>
    <div class="center">
    <?php
        $place_list = new Place();
        $places = $place_list->getPlaceById($routeId);
        // $place->insertPlace();
        $i = 0;
        $close = FALSE;
        foreach ($places as $key => $value):
            if ($value['seatNumber'][0] == "A" && $i == 0) {
    ?>
    <div class="center card-place">
    <?php
                } else if($value['seatNumber'][0] != "A" && $close != null) {
                    $close = TRUE;
                }
                if($close == TRUE) {
    ?>
    </div>
    <?php 
                    $close=null;
                }
                $i++;
                    if($value['EstDisponible'] == 0) {
    ?>
    <button class='seat btn-reserved reserved' disabled type="button" data-route='<?php echo $value['routeId']?>' data-train='<?php echo $value['trainId'];?>' data-seat='<?php echo $value['seatNumber'];?>' data-place='<?php echo $value['placeId'];?>'><?php echo $value['seatNumber'];?></button>
    <?php
                } else {
    ?>
    <button class='seat btn-reserved' type="button" data-route='<?php echo $value['routeId']?>' data-train='<?php echo $value['trainId'];?>' data-seat='<?php echo $value['seatNumber'];?>' data-place='<?php echo $value['placeId'];?>'><?php echo $value['seatNumber'];?></button>
    <?php
            }
    ?>
    <?php
        endforeach;
    ?>
    </div>
</form>
<div class="fullscreen center" id="placeView" style="display: none;">
    <?php include_once '../app/Views/Admin/PlaceView.php';?>
</div>