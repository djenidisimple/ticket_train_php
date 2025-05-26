<div class="content">
    <form action="<?php echo $url;?>" method="post" style="width: 100%; margin: 0 auto;">
        <div class="flex f-right">
            <button class="btn-close" onclick="closeBox('#routeView')">&times;</button>
        </div>
        <h1 class="center" id="title">Ajout de nouvelle Trajet</h1>
        <br>
        <div>
            <label for="route_departure">Gare de Departure</label>
            <input type="text" name="route_departure" id="route_departure">
        </div>
        <div>
            <label for="reute_arrival">Gare d'Arriver</label>
            <input type="text" name="route_arrival" id="route_arrival">
        </div>
        <div>
            <label for="route_departure">Date de Depart</label>
            <input type="datetime-local" name="date_departure" id="date_departure">
        </div>
        <div>
            <label for="reute_arrival">Date d'Arriver</label>
            <input type="datetime-local" name="date_arrival" id="date_arrival">
        </div>
        <button type="button" class="btn btn-primary w-full p-sm-10" id="btn-submit">Enregistrer</button>
    </form>
</div>