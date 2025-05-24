<form action="" method="post">
    <div class="flex f-right">
        <button class="btn-close" onclick="closeBox('#passView')">&times;</button>
    </div>
    <h2 class="center">Gestion d'information du Passager</h2>
    <br>
    <div>
        <label for="name_pass">Nom du Passager</label>
        <input type="text" name="name_pass" id="name_pass" required>
    </div>
    <div>
        <label for="first_name_pass">Prenom du Passager</label>
        <input type="text" name="first_name_pass" id="first_name_pass" required>
    </div>
    <div>
        <label for="email_pass">Email du Passager</label>
        <input type="email" name="email_pass" id="email_pass" required>
    </div>
    <div>
        <label for="tel_pass">Telephone du Passager</label>
        <input type="tel" name="tel_pass" id="tel_pass" required>
    </div>
    <div>
        <label for="date_naiss_pass">Date de Naissance du Passager</label>
        <input type="date" name="date_naiss_pass" id="date_naiss_pass" required>
    </div>
    <br>
    <div class="center">
        <button type="subtmit" class="btn w-full p-sm-10">Enregistrer</button>
    </div>
</form>