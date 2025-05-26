<form action="" method="post">
    <div class="flex f-right">
        <button class="btn-close" onclick="closeBox('#passView')">&times;</button>
    </div>
    <h2 class="center" id="title">Gestion d'information du Passager</h2>
    <br>
    <div>
        <label for="name_pass">Nom du Passager</label>
        <input type="text" name="name_pass" id="firstName">
    </div>
    <div>
        <label for="first_name_pass">Prenom du Passager</label>
        <input type="text" name="first_name_pass" id="lastName">
    </div>
    <div>
        <label for="email_pass">Email du Passager</label>
        <input type="email" name="email_pass" id="email">
    </div>
    <div>
        <label for="tel_pass">Telephone du Passager</label>
        <input type="tel" name="tel_pass" id="phoneNumber">
    </div>
    <div>
        <label for="date_naiss_pass">Date de Naissance du Passager</label>
        <input type="date" name="date_naiss_pass" id="date_naiss_pass">
    </div>
    <br>
    <div class="center">
        <button type="button" class="btn w-full p-sm-10" id="btn-update">Enregistrer</button>
    </div>
</form>