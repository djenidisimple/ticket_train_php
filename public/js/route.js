import * as constants from "/js/constant.js";
export function addDataRoute() {
    if (constants.route_departure.value === '' || constants.route_arrival.value === '' || constants.date_departure.value === '' || constants.date_arrival.value === '') {
        alert('Veuillez remplir tous les champs.');
        return;
    } else {
        fetch('/Ticket/Admin/RegisterRoute', {
            method: 'POST',
            headers: {
                contentType: 'application/json'
            },
            body: JSON.stringify({ 
                placeOfDeparture: constants.route_departure.value, 
                placeOfArrival: constants.route_arrival.value, 
                dateLeave: constants.date_departure.value, 
                dateArrived: constants.date_arrival.value,
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

export function editDataRoute(id) {
    fetch('/Ticket/Admin/REditV', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 
            id: id.value,
            data : {
                placeOfDeparture: constants.route_departure.value, 
                placeOfArrival: constants.route_arrival.value, 
                dateLeave: constants.date_departure.value, 
                dateArrived: constants.date_arrival.value,
            }
        })
    }).then(response => response.json())
    .then(data => {
        console.log(data); // Affiche le message envoyé par PHP
        window.location.href = '/Ticket/Admin/Reservation'; // Redirige vers la page
    }).catch(error => {
        console.error('Erreur AJAX :', error);
    });
}

export function deleteDataRoute(id) {
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

export function openBoxRoute(value, id = 0, edit = false) { 
    document.querySelector(value).style.display = 'flex'; 
    document.querySelector(value).value = id;
    if (edit) {
        document.querySelector("#title").innerHTML = "Modification du Trajet";
        fetch('/Ticket/Admin/REdit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        }).then(response => response.json())
        .then(data => {
            document.querySelector("#route_departure").value = data['data'].placeOfDeparture;
            document.querySelector("#route_arrival").value = data['data'].placeOfArrival;
            document.querySelector("#date_departure").value = data['data'].dateLeave;
            document.querySelector("#date_arrival").value = data['data'].dateArrived;
        }).catch(error => {
            console.error('Erreur AJAX :', error);
        });
    } else {
        document.querySelector("#title").innerHTML = "Ajout de nouvelle Trajet";
    }
}