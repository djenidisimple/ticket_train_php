<div class="content">
    <?php
        $error = $data["error"] ?? null;
        $succes = $data["succes"] ?? null;
        $name = $capacity = null;
        $url = "/Ticket/Admin/RegisterTrain";
        if (!empty($data['Train'])) {
            $name = $_POST['train_name'] ?? $data['Train']['nameTrain'];
            $capacity = $_POST['train_capacity'] ?? $data['Train']['CapacityTrain'];
            $url = "/Ticket/Admin/TEdit/" . $data['Train']['trainId'];
        }
    ?>
    <?php if ($error != null):?>
        <div class="alert alert-danger">
            <?php foreach ($error as $err): ?>
                <p><?php echo $err; ?></p>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-success">
            <?php if ($succes != null): ?>
                <p><?php echo $succes; ?></p>
            <?php endif; ?>
        </div>
    <?php endif;?>
    <form action="<?php echo $url;?>" method="post" style="width: 500px;margin: 0 auto;">
        <?php if (!empty($data['Train'])) :?>
        <h1 class="center">Modification de Train</h1>
        <?php else:?>
        <h1 class="center">Ajout de nouvelle Train</h1>
        <?php endif;?>
        <br><br>
        <div>
            <label for="train_name">Nom du Train</label>
            <input type="text" name="train_name" id="train_name" value="<?php echo $name;?>" required>
        </div>
        <div>
            <label for="train_capacity">Capacité du Train</label>
            <input type="number" name="train_capacity" id="train_capacity" value="<?php echo $capacity;?>" required>
        </div>
        <br><br>
        <button type="submit" class="btn w-full p-sm-10 primary">Enregistrer</button>
        <br>
    </form>
</div>