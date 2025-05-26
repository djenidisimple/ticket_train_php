<div class="content">
    <img src="" alt="icon"> /
    <span>Historique</span>
    <br><br>
    <h1>Liste des Passagers</h1>
    <br>
    <hr style="border: 1px solid gray;width: 100%;">
    <br>
    <?php
        $passenger = new Passenger();
        $pass = $passenger->getAllPassenger();
        if (count($pass) > 0):
    ?>
    <table>
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date de naissance</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 1;
        foreach ($pass as $key => $value):
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value['name'];?></td>
            <td><?php echo $value['firstName'];?></td>
            <td><?php echo $value['email'];?></td>
            <td><?php echo $value['Phone'];?></td>
            <td><?php echo $value['dateOfBirth'];?></td>
            <td>
                <button onclick="Passenger.openBoxPass('#dialog', <?php echo $value['passId'];?>)" type="button" class="btn-action">
                    <img src="/images/trash-dark.png" alt="delete" class="icon-action">
                </button>
                <button onclick="Passenger.openBoxPass('#passView', '<?php echo $value['passId'];?>', true)" type="button" class="btn-action">
                    <img src="/images/edit-dark.png" alt="edit" class="icon-action">
                </button>
            </td>
        </tr>
        <?php
            $i++;
        ?>
        <?php endforeach; ?>
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
            <button class="btn" style="margin: 5px" onclick="Passenger.deleteDataPass(document.getElementById('dialog'))">Oui</button>
            <button class="btn" style="margin: 5px" onclick="cancelDelete()">Non</button>
            <br>
        </div>
    </div>
    <div class="fullscreen center" id="passView" style="display: none;">
        <?php include_once '../app/Views/Admin/PassView.php';?>
    </div>
</div>