<?php
    $train = new Train();
    $nameTrain = $train->getNameTrainById($_SESSION["trainID"]);
?>
<a href="/Ticket/Admin/R/<?php echo $_SESSION["routeID"];?> " class="btn-back"></a>
<h1 class="center">Réservation de place dans le train  <b><?php echo $nameTrain["nameTrain"] ?? null;?></b></h1>
<form action="/Ticket/Admin/T/<?php echo $_SESSION["trainID"];?>" method="post">
    <div class="center">
        <div class="card-detaille" style="width: 250px">
            <div class="center">
                <div class="center">
                    <div style="background: green;width: 35px;height: 35px;" class="center text-white">
                        N
                    </div>
                    <div class="center" style="width: 50px;margin-left: 5px;margin-right: 10px;">
                        Place réserver
                    </div>
                </div>
                <div class="center">
                    <div style="background: blue;width: 35px;height: 35px;" class="center text-white">
                        N
                    </div>
                    <div class="center" style="width: 50px;margin-left: 5px;">
                        Place Libre
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="center">
    <?php
        if (isset($_SESSION['save']) && $_SESSION['save'] == true) {
            echo "<p>Réservation réussie !</p>";
            unset($_SESSION['save']);
        }
        $place_list = new Place();
        $places = $place_list->getPlaceById($_SESSION['routeID']);
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
    <div class="center card-form" style="width: 350px; margin: 25px;">
        <h1>Reservation</h1>
        <div>
            <div>
                <label for="name_pass">Nom du Passager</label>
            </div>
            <div>
                <input type="text" name="name_pass" id="name_pass" required>
            </div>
        </div>
        <div>
            <div>
                <label for="first_name">Prenom Passager</label>
            </div>
            <div>
                <input type="text" name="first_name_pass" required value=>
            </div>
        </div>
        <div>
            <div>
                <label for="email_pass">Email Passager</label>
            </div>
            <div>
                <input type="email" name="email_pass" required value="">
            </div>
        </div>
        <div>
            <div>
                <label for="phone_pass">Numéro de téléphone du Passager</label>
            </div>
            <div>
                <input type="text" name="phone_pass" required value="">
            </div>
        </div>
        <div>
            <div>
                <label for="date_birth">Date d'anniversaire</label>
            </div>
            <div>
                <input type="date" name="date_of_birth" required value="">
            </div>
        </div>
        <div class="center" style="width: 100%">   
            <p>
                Les places choisies : <span class='container'></span>
            </p>
        </div>
        <div class="center">
            <button type="subtmit">Réserver</button>
        </div>
    </div>
</form>
<script src="/js/javaScript.js"></script>