<?php
    $router = new Router();
    $url = $router->get_url();
    $url_return = "";
    // var_dump($url);
    // exit;
    if (count($url) == 2 && $url[0] == "Ticket" && $url[1] == "Admin") {
        $menu = "Administration";
        $url_return = "/Ticket/Admin";
    } else if (count($url) == 3 && ($url[2] == "Reservation" ) || (count($url) == 4 && $url[1] == "Admin" && $url[2] == "R") || (count($url) == 6 && $url[1] == "Admin" && $url[2] == "R")) {
        $menu = "Reservation";
        $url_return = "/Ticket/Admin/Reservation";
    } else if (count($url) == 3 && $url[2] == "Pass") {
        $menu = "Historique";
        $url_return = "/Ticket/Admin/Pass";
    } else {
        $menu = "Aucun";
    }
?>
<a href="<?= $url_return;?>">
    <img src="/images/home.png" alt="icon" class="icon-menu"> /
</a>
<span><?= $menu;?></span>
<!-- <span><a href="/Ticket/Admin/Reservation">Reception</a> / <a href="/Ticket/Admin/R/<?php echo $routeId;?> ">Choix de train</a> / -->