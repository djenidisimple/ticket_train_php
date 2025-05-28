import * as Route from "/js/route.js";
import * as Passenger from "/js/passenger.js";
import * as Train from "/js/train.js";
import * as Place from "/js/place.js";

function showDialog() {
    dialog.style.display = 'flex';
}

function cancelDelete() { 
    dialog.style.display = 'none'; 
}

function closeBox(value) { 
    document.querySelectorAll('form')
    .forEach(
        form => {
        form.reset();
    }); 
    document.querySelector(value).style.display = 'none'; 
}

// function accessible in html
window.Route = Route;
window.Passenger = Passenger;
window.Train = Train;
window.Place = Place;

if (Route.btn_submit) {
    Route.btn_submit.addEventListener('click', function() {
        let title = document.querySelector('#title').textContent;
        if (title === "Ajout de nouvelle Trajet") {
            Route.addDataRoute();
        } else if (title === "Modification du Trajet") {
            Route.editDataRoute(document.querySelector('#routeView'));
        }
    });
}

if (Passenger.btn_update) {
    Passenger.btn_update.addEventListener('click', function() {
        Passenger.editDataPass(document.querySelector('#passView'));
    });
}

if (Train.btn_train_submit) {
    Train.btn_train_submit.addEventListener('click', function() {
        let title = document.querySelector('#title').textContent;
        if (title === "Ajout de nouvelle Trajet") {
            Train.addDataTrain();
        } else if (title === "Modification du Trajet") {
            Train.editDataTrain(document.querySelector('#trainView'));
        }
    });
}

if (Place.seat) {
    Place.seat.forEach(button => {
        button.addEventListener('click', function() {
            Place.coloredPlace.call(this); // Appelle la fonction pour colorer le siège
        });
    });
}

if (Place.btn_reserved) {
    Place.btn_reserved.forEach(button => {
        button.addEventListener('click', function() {
            Place.addDataPlace.call(this); // Appelle la fonction pour ajouter les données de place
        })    
    });
}


window.closeBox = closeBox;
window.showDialog = showDialog;
window.cancelDelete = cancelDelete;