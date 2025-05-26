let seatNumber = [], placeId = [], routeId = 1, id = 0;

document.querySelectorAll('.seat').forEach(button => {
    button.addEventListener('click', function() {
        // alert('Vous avez cliqué sur le siège ' + this.dataset.seat); // Affiche le numéro de siège
        if(this.disabled)
        {
            seatNumber.clear(); // Réinitialise le tableau seatNumber
            placeId.clear(); // Réinitialise le tableau placeId
            this.classList.remove("reserved");
            this.disabled = false;
        } else {
            seatNumber.push(this.dataset.seat); // Ajoute le numéro de siège au tableau
            placeId.push(this.dataset.place); // Ajoute l'ID de place au tableau
            this.classList.add("reserved");
            this.disabled = true;
        }
        // document.querySelector('.container').innerHTML = seatNumber.join(', '); // Affiche les numéros de siège sélectionnés dans le conteneur
    });
});

document.querySelectorAll('.btn-reserved').forEach(button => {
    button.addEventListener('click', function() {
        fetch('/Ticket/Admin/RegisterReservation', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 
                routeId: this.dataset.route, 
                placeId: placeId, 
                trainId: this.dataset.train,
                seatNumber: seatNumber,
            })
        })
        .then(response => response.json())  // Une seule lecture de response
        .then(data => {
            console.log(data.message); // Affiche le message envoyé par PHP
            // window.location.href = '/Ticket/Admin/Place'; // Redirige vers la page
            document.querySelector('.container').innerHTML = data.message['seatNumber']; // Affiche les numéros de siège sélectionnés dans le conteneur
        })
        .catch(error => {
            console.error('Erreur AJAX :', error);
        });
    })    
});
const dialog = document.getElementById('dialog');
const route_departure = document.getElementById('route_departure');
const route_arrival = document.getElementById('route_arrival');
const date_departure = document.getElementById('date_departure');
const date_arrival = document.getElementById('date_arrival');
function registerRoute() {
    if (route_departure.value === '' || route_arrival.value === '' || date_departure.value === '' || date_arrival.value === '') {
        alert('Veuillez remplir tous les champs.');
        return;
    } else {
        fetch('/Ticket/Admin/RegisterRoute', {
            method: 'POST',
            headers: {
                contentType: 'application/json'
            },
            body: JSON.stringify({ 
                placeOfDeparture: route_departure.value, 
                placeOfArrival: route_arrival.value, 
                dateLeave: date_departure.value, 
                dateArrived: date_arrival.value,
            })
        }).then(response => response.json())
        .then(data => {
            console.log(data.message); // Affiche le message envoyé par PHP
            window.location.href = '/Ticket/Admin/Reservation'; // Redirige vers la page
        })
        .catch(error => {
            console.error('Erreur AJAX :', error);
        });
    }
}
function showDialog() {dialog.style.display = 'flex';}
function deleteValue(value) { dialog.style.display = 'none'; }
function cancelDelete() { dialog.style.display = 'none'; }
function closeBox(value) { document.querySelector(value).style.display = 'none'; }
function getConfirmation(value) {
    document.querySelector(value).addEventListener('click', function(event) {
        return true;
    });
    return false;
}
function openBox(value, id = 0) { 
    document.querySelector(value).style.display = 'flex'; 
    document.querySelector(value).value = id; 
}
function deleteDataRoute(id) {
    fetch('/Ticket/Admin/RDelete/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id.value })
    }).then(response => response.json())
    .then(data => {
        console.log(data); // Affiche le message envoyé par PHP
        window.location.href = '/Ticket/Admin/Reservation'; // Redirige vers la page
    })
}