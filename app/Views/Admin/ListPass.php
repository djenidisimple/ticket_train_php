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
                <a href="/Ticket/Admin/PassDelete/<?php echo $value['passId'];?>">
                    <img src="/images/trash-dark.png" alt="delete" class="icon-action">
                </a>
                <a href="/Ticket/Admin/PassEdit/<?php echo $value['passId'];?>">
                    <img src="/images/edit-dark.png" alt="edit" class="icon-action">
                </a>
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
</div>