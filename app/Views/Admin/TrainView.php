<div class="content">
    <form action="<?php echo $url;?>" method="post" style="width: 500px;margin: 0 auto;">
        <div class="flex f-right">
            <button class="btn-close" onclick="closeBox('#trainView')">&times;</button>
        </div>
        <h1 class="center" id="title">Ajout de nouvelle Train</h1>
        <br><br>
        <div>
            <label for="train_name">Nom du Train</label>
            <input type="text" name="train_name" id="train_name">
        </div>
        <div>
            <label for="train_capacity">Capacité du Train</label>
            <input type="number" name="train_capacity" id="train_capacity">
        </div>
        <br><br>
        <button type="button" class="btn w-full p-sm-10 primary" id="btn-train-submit">Enregistrer</button>
        <br>
    </form>
</div>