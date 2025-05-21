<h1 class="center">Liste des Trajets existants</h1>
<div class="center">
    <a href="/Ticket/Admin/RegisterRoute" class="btn-add"></a>
</div>
<div class="center">
    <div class="card">
        <?php
            $route = new Route();
            $routes = $route->getAllRoute();
            if (count($routes) > 0):
        ?>
        <table>
            <tr class="bg-dodgerblue">
                <th>Gare de départ</th>
                <th>Gare d'Arrivé</th>
                <th>Date de Départ</th>
                <th>Date d'Arriver</th>
                <th>Actif</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($routes as $key => $value):
            ?>
            <tr>
                <td><?php echo $value['placeOfDeparture'];?></td>
                <td><?php echo $value['placeOfArrival'];?></td>
                <td><?php echo $value['dateLeave'];?></td>
                <td><?php echo $value['dateArrived'];?></td>
                <td><?php echo $value['IsActive'];?></td>
                <td>
                    <a href="/Ticket/Admin/RDelete/<?php echo $value['routeId'];?>">Supprimer</a>
                    <a href="/Ticket/Admin/REdit/<?php echo $value['routeId'];?>">Modifier</a>
                    <a href="/Ticket/Admin/R/<?php echo $value['routeId'];?>">voir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php
            else:
            echo "Il n'y a pas de place libre libre pour le moment!";
        ?>
        <?php
            endif;
        ?>
    </div>
</div>