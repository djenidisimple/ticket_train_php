<div class="center">
    <div class="card">
        <?php
            $train = new Train();
            $train = $train->getTrainById((int)$_SESSION["routeID"]);
            $route = new Route();
            $nameTrajet = null;
            $nameTrajet = $route->getRouteById((int)$_SESSION["routeID"]) ?? null;
        ?>
        <a href="/Ticket/Admin/Reservation" class="btn-back"></a>
        <a href="/Ticket/Admin/RegisterTrain" class="btn-add"></a>
        </hr>
        <h1 class="center">Liste des Trains de <?php echo $nameTrajet["placeOfDeparture"];?> à <?php echo $nameTrajet["placeOfArrival"];?></h1>
        <div class="center">
            <?php
                if ($train):
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
                $train = new Train();
                $train = $train->getAllTrain();
                foreach ($train as $key => $value):
                    ?>
                    <tr>
                        <td><?php echo $value['nameTrain'];?></td>
                        <td><?php echo $value['CapacityTrain'];?></td>
                        <td><?php echo 5;?></td>
                        <td>
                            <a href="/Ticket/Admin/TDelete/<?php echo $_SESSION["routeID"] . "/" . $value['trainId'];?>">Supprimer</a>
                            <a href="/Ticket/Admin/TEdit/<?php echo $value['trainId'];?>">Modifier</a>
                            <a href="/Ticket/Admin/T/<?php echo $value['trainId'];?>">voir</a>
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
        </div>
    </div>
</div>