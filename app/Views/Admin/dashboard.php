<h1>Dashboard</h1>
<?php
    $train = new Train();
    $route = new Route();
    $place = new Place();
    $nb_train = $train->countTrain();
    $nb_route = $route->countRoute();
    $nb_place = $place->countPlace();
?>
<div class="center">
    <div class="box center t-m">
        <div class="center card-dsh">
            <img src="/images/train.gif" alt="Logo" class="logo-dsh">
            <span class="text-show">
                <?= $nb_train;?>
            </span>
        </div>    
        <div>
            <span class="center description">
                Train disponible
            </span>    
        </div>    
    </div>
    <div class="box center t-m">
        <div class="center card-dsh">
            <img src="/images/way.gif" alt="Logo" class="logo-dsh">
            <span class="text-show">
                <?= $nb_route;?>
            </span>
        </div>    
        <div>
            <span class="center description">
                Trajet disponible
            </span>    
        </div> 
    </div>
    <div class="box center t-m">
        <div class="center card-dsh">
            <img src="/images/tickets.gif" alt="Logo" class="logo-dsh">
            <span class="text-show">
                <?= $nb_place;?>
            </span>
        </div>    
        <div>
            <span class="center description">
                Nombre de billet vendu
            </span>    
        </div> 
    </div>
    <div class="box center t-m">
        <div class="center card-dsh">
            <img src="/images/passenger.gif" alt="Logo" class="logo-dsh">
            <span class="text-show">
                <?= $nb_place;?>
            </span>
        </div>    
        <div>
            <span class="center description">
                Nombre de Place occuper
            </span>    
        </div> 
    </div>
</div>
<!-- <h1>Statistique</h1>
<img src="" alt="ici une image">
<h1>Nombre de visite du site web</h1>
<img src="" alt="ici une image">
<h1>Les listes des derniers reservations</h1>
<img src="" alt="ici une image"> -->