<h1 class="center">Liste des Trajets existants</h1>
<?php
    $route = new Route();
    $routes = $route->getAllRoute();
    if (count($routes) > 0):
?>
<table>
    <tr>
        <th>Gare de départ</th>
        <th>Gare d'Arrivé</th>
        <th>Date de Départ</th>
        <th>Date d'Arriver</th>
        <th>Actif</th>
        <th>Supprimer</th>
        <th>Modifier</th>
        <th>Voir</th>
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
        <td><a href="/Ticket/Admin/Delete/<?php echo $value['routeId'];?>">Supprimer</a></td>
        <td><a href="/Ticket/Admin/Edit/<?php echo $value['routeId'];?>">Modifier</a></td>
        <td><a href="/Ticket/Admin/<?php echo $value['routeId'];?>">voir</a></td>
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