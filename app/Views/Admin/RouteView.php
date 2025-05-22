<div class="content">
    <?php 
        $departure = $arrival = $dateLeave = $dateArrival = $erreur = $succes = null;
        $erreur = $data["error"] ?? null;
        $succes = $data["succes"] ?? null;
        $url = "/Ticket/Admin/RegisterRoute";
        if (!empty($data['Route'])) {
            $departure = $_POST["route_departure"] ?? $data["Route"]["placeOfDeparture"];
            $arrival = $_POST["route_arrival"] ?? $data["Route"]["placeOfArrival"];
            $dateLeave = $_POST["date_departure"] ?? $data["Route"]["dateLeave"];
            $dateArrival = $_POST["date_arrival"] ?? $data["Route"]["dateArrived"];
            $url = "/Ticket/Admin/REdit/" . $data["Route"]["routeId"];
        } else if (!empty($_POST)) {
            $departure = $_POST["route_departure"];
            $arrival = $_POST["route_arrival"];
            $dateLeave = $_POST["date_departure"];
            $dateArrival = $_POST["date_arrival"];
        }
    ?>
    <?php if ($erreur != null):?>
        <div>
            <div class="alert alert-danger">
                <?php
                    foreach ($erreur as $key => $value) {
                        echo $value;
                    }
                ?>
            </div>
        </div>
    <?php else: ?>
        <div>
            <div class="alert alert-success">
                <?php
                    if ($succes != null) {
                        echo $succes;
                    }
                ?>
            </div>
        </div>
    <?php endif;?>
    <form action="<?php echo $url;?>" method="post" style="width: 40%; margin: 0 auto;">
        <?php if (!empty($data['Route'])) :?>
        <h1 class="center">Modification de Trajet</h1>
        <?php else:?>
        <h1 class="center">Ajout de nouvelle Trajet</h1>
        <?php endif;?>
        <br>
        <div>
            <label for="route_departure">Gare de Departure</label>
            <input type="text" name="route_departure" id="route_departure" value="<?php echo $departure;?>" required>
        </div>
        <div>
            <label for="reute_arrival">Gare d'Arriver</label>
            <input type="text" name="route_arrival" id="route_arrival" value="<?php echo $arrival;?>" required>
        </div>
        <div>
            <label for="route_departure">Date de Depart</label>
            <input type="datetime-local" name="date_departure" id="route_departure" value="<?php echo $dateLeave;?>" required>
        </div>
        <div>
            <label for="reute_arrival">Date d'Arriver</label>
            <input type="datetime-local" name="date_arrival" id="route_arrival" value="<?php echo $dateArrival;?>" required>
        </div>
        <button type="submit" class="btn btn-primary w-full p-sm-10">Envoyer</button>
    </form>
</div>