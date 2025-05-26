<div class="content">
    <img src="" alt="icon"> /
    <span>Reception</span>
    <br><br>
    <div>
        <h1 style="display: inline-block;">Liste des Trajets existants</h1>
        <!-- <a href="/Ticket/Admin/RegisterRoute" class="btn" style="float: right;">Ajouter</a> -->
        <button class="btn" style="float: right;" onclick="openBox('#routeView')">Ajouter</button>
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
                <button onclick="openBox('#dialog', '<?php echo $value['routeId'];?>')" type="button" class="btn-action">
                    <img src="/images/trash-dark.png" alt="delete" class="icon-action">
                </button>
                <button onclick="openBox('#routeView', '<?php echo $value['routeId'];?>')" type="button" class="btn-action">
                    <img src="/images/edit-dark.png" alt="edit" class="icon-action">
                </button>
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
    <div class="fullscreen center" id="dialog" style="display: none;">
        <div class="card center" style="width: 300px;margin: 15px auto;">
            <h3>Voulez vous confirmer la suppression ?</h3> 
            <button class="btn" style="margin: 5px" id="confirmation" onclick="deleteDataRoute(document.getElementById('dialog'))">Oui</button>
            <button class="btn" style="margin: 5px" onclick="cancelDelete()">Non</button>
            <br>
        </div>
    </div>
    <div class="fullscreen center" id="routeView" style="display: none;">
        <?php include_once '../app/Views/Admin/RouteView.php';?>
    </div>
</div>