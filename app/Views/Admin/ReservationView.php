<div class="content">
    <form action="/Ticket/Admin/RegisterReservation2" method="post">
    <?php
        if (isset($_SESSION['save']) && $_SESSION['save'] == true) {
            echo "<p>Réservation réussie !</p>";
            unset($_SESSION['save']);
        }
        $place_list = new Place();
        $places = $place_list->getPlaceById(1);
        // $place->insertPlace();
        
        foreach ($places as $key => $value):
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
        <div>
            <label for="name_pass">Nom du Passager</label>
            <input type="text" name="name_pass" id="name_pass" required>
        </div>
        <div>
            <label for="first_name">Prenom Passager</label>
            <input type="text" name="first_name_pass" required value=>
        </div>
        <div>
            <label for="email_pass">Email Passager</label>
            <input type="email" name="email_pass" required value="">
        </div>
        <div>
            <label for="phone_pass">Numéro de téléphone du Passager</label>
            <input type="text" name="phone_pass" required value="">
        </div>
        <div>
            <label for="date_birth">Date d'anniversaire</label>
            <input type="date" name="date_of_birth" required value="">
        </div>
        <div>
            <p>
                Les places choisies : <span class='container'></span>
            </p>
        </div>
        <div class="center">
            <button type="subtmit">Réserver</button>
        </div>
    </form>
    <script src="/js/javaScript.js"></script>
</div>