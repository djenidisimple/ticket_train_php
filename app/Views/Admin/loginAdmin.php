<?php 
    session_start();
    if (isset($_SESSION['name'])) {
        header("Location: Home.php");
        exit;
    }
?>
<?php
    $pseudo = $psw = $error = $pseudo = $psw = $succes = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pseudo = $_POST["pseudo"];
        $psw = $_POST["psw"];
        if (empty($pseudo) && empty($psw)) {
            $error = "Tous les champs sont obligatoire!";
        } else {
            $url = "";
            include "To-Do List.php";
            if(!getCustomer($pseudo, $psw)) {
                $error = "Le pseudo ou mot de passe est incorrecte!";
            } else {
                $succes = "Vous etes connecter!";
                $_SESSION['name'] = $pseudo;
                header("Location: Home.php");
            }
        }
    }
?>
<div class="center" style="height: 100px;">
    <form class="form-popup" method="post" style="width: 350px;">
        <h1 class="center-text">Connexion</h1>
        <br>
        <?php if ($error):?>
        <p class="message-error center-text"><?= $error;?></p>
        <?php elseif ($succes):?>
        <p class="message-success center-text"><?= $succes;?></p>
        <?php endif;?>
        <br>
        <div style="width: auto;padding-right: 10px;">
            <input type="text" name="pseudo" placeholder="Pseudo..." value="<?= $pseudo;?>" required>
        </div>
        <div style="width: 97%;height: 36px;padding-right: 10px;background: rgb(204, 197, 197);border-radius: 5px;">
            <input type="password" style="width: 85%;" name="psw" id="psw" placeholder="Mot de passe ..." value="<?= $psw;?>" required>
            <input class="eyes" type="button" onclick="password(this)">
        </div>
        <br>
        <button class="btn" type="submit" style="width: 100%;">se connecter</button>
        <br>
        <span>
            Si vous n'avez pas de compte ?
            <a href="">s'inscrire</a>
        </span>
    </form>
</div>