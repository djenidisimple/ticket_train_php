export { seat, btn_reserved } from '/js/constant.js';
let seatNumber = [], placeId = [], routeId = 1,trainId = 1, id = 0;

export function coloredPlace() {
    // alert('Vous avez cliqué sur le siège ' + this.dataset.seat); // Affiche le numéro de siège
    if(this.disabled)
    {
        seatNumber.clear(); // Réinitialise le tableau seatNumber
        placeId.clear(); // Réinitialise le tableau placeId
        this.classList.remove("reserved");
        this.disabled = false;
    } else {
        seatNumber.push(this.dataset.seat); // Ajoute le numéro de siège au tableau
        placeId.push(this.dataset.place);
        routeId = this.dataset.route // Ajoute l'ID de place au tableau
        trainId = this.dataset.train // Ajoute l'ID de place au tableau
        this.classList.add("reserved");
        this.disabled = true;
    }
    document.querySelector('#listSeat').innerHTML = seatNumber.join(', '); // Affiche les numéros de siège sélectionnés dans le conteneur
}

export function openBoxPlace(value, id = 0, edit = false) { 
    if (seatNumber.length > 0) {
        document.querySelector(value).style.display = 'flex'; 
        document.querySelector(value).value = id;
        document.querySelector('.container').innerHTML = seatNumber.join(', '); // Affiche les numéros de siège sélectionnés dans le conteneur
    }
}

export function addDataPlace() {
    const name_pass = document.querySelector('#name_pass').value;
    const first_name_pass = document.querySelector('#first_name').value;
    const email_pass = document.querySelector('#email_pass').value;
    const phone_pass = document.querySelector('#phone_pass').value;
    const date_of_birth_pass = document.querySelector('#date_birth').value;
    if (first_name_pass === '' || name_pass === '' || email_pass === '' || phone_pass === '' || date_of_birth_pass === '') {
        alert('Veuillez remplir tous les champs');
        return;
    } else {
        fetch('/Ticket/Admin/RegisterReservation', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                placeId: placeId, 
                data : {
                    routeId: routeId, 
                    trainId: trainId,
                    seatNumber: seatNumber,
                },
                pass: {
                    name: name_pass,
                    firstName: first_name_pass,
                    email: email_pass,
                    phone: phone_pass,
                    dateOfBirth: date_of_birth_pass
                }
            })
        })
        .then(response => response.json())  // Une seule lecture de response
        .then(data => {
            console.log(data.message); // Affiche le message envoyé par PHP
            window.location.reload(); // Redirige vers la page
            // document.querySelector('.container').innerHTML = data.message['seatNumber']; // Affiche les numéros de siège sélectionnés dans le conteneur
        })
        .catch(error => {
            console.error('Erreur AJAX :', error);
        });
    }
}