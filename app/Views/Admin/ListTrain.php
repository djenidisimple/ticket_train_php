<div class="content">
    <?php
            $train = new Train();
            $train = $train->getTrainById((int)$_SESSION["routeID"]);
            $route = new Route();
            $nameTrajet = null;
            $nameTrajet = $route->getRouteById((int)$_SESSION["routeID"]) ?? null;
    ?>
    <img src="" alt="icon"> /
    <span>Reception/ Choix de train</span>
    <br><br>
    <h1 style="display: inline-block;">Liste des Trains de <?php echo $nameTrajet["placeOfDeparture"];?> à <?php echo $nameTrajet["placeOfArrival"];?></h1>
    <a href="/Ticket/Admin/Reservation" class="btn-back"></a>
    <a href="/Ticket/Admin/RegisterTrain" class="btn" style="float: right;">Ajouter</a>
    <br>
    <br>
    <hr style="border: 1px solid gray;width: 100%;">
    <br>
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
                        <a href="/Ticket/Admin/TDelete/<?php echo $_SESSION["routeID"] . "/" . $value['trainId'];?>">
                            <img src="/images/trash-dark.png" alt="delete" class="icon-action">
                        </a>
                        <a href="/Ticket/Admin/TEdit/<?php echo $value['trainId'];?>">
                            <img src="/images/edit-dark.png" alt="edit" class="icon-action">
                        </a>
                        <!-- <a href="/Ticket/Admin/T/<?php echo $value['trainId'];?>">voir</a> -->
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