let seatNumber = [], placeId = [], routeId = 1;

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