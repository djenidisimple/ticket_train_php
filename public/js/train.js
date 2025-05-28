import { title, nameTrain, capacityTrain } from '/js/constant.js';
export { btn_train_submit } from '/js/constant.js';
export function openBoxTrain(value, id = 0, edit = false) { 
    document.querySelector(value).style.display = 'flex'; 
    document.querySelector(value).value = id;
    if (edit) {
        title.innerHTML = "Modification du Trajet";
        fetch('/Ticket/Admin/TEdit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        }).then(response => response.json())
        .then(data => {
            console.log('Données reçues :', data['data']);
            nameTrain.value = data['data'].nameTrain;
            capacityTrain.value = data['data'].CapacityTrain;
        }).catch(error => {
            console.error('Erreur AJAX :', error);
        });
    } else {
        title.innerHTML = "Ajout de nouvelle Trajet";
    }
}
export function editDataTrain(id) {
    fetch('/Ticket/Admin/TEditV', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 
            id: id.value,
            data: {
                nameTrain: nameTrain.value, 
                capacityTrain: capacityTrain.value
            } 
        })
    }).then(response => response.json())
    .then(data => {
        console.log('Données reçues :', data);
        if (data['status'] === 'success') {
            window.location.reload();
        } else {
            alert('Erreur lors de la modification du trajet.');
        }
    }).catch(error => {
        console.error('Erreur AJAX :', error);
    });
}
export function deleteDataTrain(id) {
    fetch('/Ticket/Admin/TDelete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(
            { 
                id: id.value,
            })
    }).then(response => response.json())
    .then(data => {
        console.log('Données reçues :', data);
        if (data['status'] === 'success') {
            window.location.reload();
        } else {
            alert('Erreur lors de la suppression du trajet.');
        }
    }).catch(error => {
        console.error('Erreur AJAX :', error);
    });
}
export function addDataTrain() {
    fetch('/Ticket/Admin/TAdd', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 
            routeId: document.querySelector('#trainView').value,
            data: {
                nameTrain: nameTrain.value, 
                capacityTrain: capacityTrain.value
            } 
        })
    }).then(response => response.json())
    .then(data => {
        console.log('Données reçues :', data);
        // if (data['status'] === 'success') {
        //     window.location.reload();
        // } else {
        //     alert('Erreur lors de l\'ajout du trajet.');
        // }
    }).catch(error => {
        console.error('Erreur AJAX :', error);
    });
}