<form method="post">
    <div class="flex f-right">
        <button class="btn-close" onclick="closeBox('#placeView')">&times;</button>
    </div>
    <h1 style="text-align: center;">Reservation</h1>
    <br>
    <div>
        <div>
            <label for="name_pass">Nom du Passager</label>
        </div>
        <div>
            <input type="text" name="name_pass" id="name_pass">
        </div>
    </div>
    <div>
        <div>
            <label for="first_name">Prenom Passager</label>
        </div>
        <div>
            <input type="text" name="first_name_pass" id="first_name">
        </div>
    </div>
    <div>
        <div>
            <label for="email_pass">Email Passager</label>
        </div>
        <div>
            <input type="email" name="email_pass" id="email_pass">
        </div>
    </div>
    <div>
        <div>
            <label for="phone_pass">Numéro de téléphone du Passager</label>
        </div>
        <div>
            <input type="text" name="phone_pass" id="phone_pass">
        </div>
    </div>
    <div>
        <div>
            <label for="date_birth">Date d'anniversaire</label>
        </div>
        <div>
            <input type="date" name="date_of_birth" id="date_birth">
        </div>
    </div>
    <div style="width: 100%">   
        <p>
            Les places choisies : <span class='container'></span>
        </p>
    </div>
    <div class="center">
        <button type="button" class="btn-reserved">Réserver</button>
    </div>
</form>