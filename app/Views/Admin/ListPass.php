<h1 class="center">Liste des Passagers</h1>
<div class="center">
    <div class="card">
        <?php
            $passenger = new Passenger();
            $pass = $passenger->getAllPassenger();
            if (count($pass) > 0):
        ?>
        <table>
            <tr class="bg-dodgerblue">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date de naissance</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($pass as $key => $value):
            ?>
            <tr>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['firstName'];?></td>
                <td><?php echo $value['email'];?></td>
                <td><?php echo $value['Phone'];?></td>
                <td><?php echo $value['dateOfBirth'];?></td>
                <td>
                    <a href="/Ticket/Admin/PassDelete/<?php echo $value['passId'];?>">Supprimer</a>
                    <a href="/Ticket/Admin/PassEdit/<?php echo $value['passId'];?>">Modifier</a>
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