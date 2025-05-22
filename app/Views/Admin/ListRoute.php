<div class="content">
    <img src="" alt="icon"> /
    <span>Reception</span>
    <br><br>
    <div>
        <h1 style="display: inline-block;">Liste des Trajets existants</h1>
        <a href="/Ticket/Admin/RegisterRoute" class="btn" style="float: right;">Ajouter</a>
    </div>
    <br>
    <hr style="border: 1px solid gray;width: 100%;">
    <br>
    <span class="round-actif p-sm"></span> Actif <span class="round-none p-sm"></span> Non Actif
    <a href="/Ticket/Admin/R/<?php echo $value['routeId'];?>" class="btn">voir</a>
    <br>
    <br>
    <?php
        $route = new Route();
        $routes = $route->getAllRoute();
        if (count($routes) > 0):
    ?>
    <table>
        <tr class="bg-dodgerblue">
            <th>No</th>
            <th>Gare de départ</th>
            <th>Gare d'Arrivé</th>
            <th>Date de Départ</th>
            <th>Date d'Arriver</th>
            <th>Actif</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 1;
        foreach ($routes as $key => $value):
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value['placeOfDeparture'];?></td>
            <td><?php echo $value['placeOfArrival'];?></td>
            <td><?php echo $value['dateLeave'];?></td>
            <td><?php echo $value['dateArrived'];?></td>
            <td>
                <?php if ($value['IsActive'] == 1):?>
                <span class="round-actif p-sm"></span>
                <?php else: ?>
                <span class="round-none p-sm"></span>
                <?php endif;?>
            </td>
            <td>
                <a href="/Ticket/Admin/RDelete/<?php echo $value['routeId'];?>">
                    <img src="/images/trash-dark.png" alt="delete" class="icon-action">
                </a>
                <a href="/Ticket/Admin/REdit/<?php echo $value['routeId'];?>">
                    <img src="/images/edit-dark.png" alt="edit" class="icon-action">
                </a>
            </td>
        </tr>
        <?php 
            $i++;
            endforeach; 
        ?>
    </table>
    <?php
        else:
        echo "Il n'y a pas de place libre libre pour le moment!";
    ?>
    <?php
        endif;
    ?>
</div>