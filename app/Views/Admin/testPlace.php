<?php
    include "../app/Models/Place.php";
    $place_list = new Place();
    $places = $place_list->getPlaceById(1);
    // $place->insertPlace();
    
    foreach ($places as $key => $value):
?>
<button class='seat' data-route='<?php echo $value['routeId']?>' data-train='<?php echo $value['trainId'];?>' data-seat='<?php echo $value['seatNumber'];?>' data-place='<?php echo $value['placeId'];?>'><?php echo $value['seatNumber'];?></button>
<?php
    endforeach
?>
<div>
    <p>
        Les places choisies : <span class='container'></span>
    </p>
</div>
<button class="btn-reserved">Réserver</button>
<script src="/js/javaScript.js"></script>