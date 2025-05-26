import { title } from "/js/constant.js";
export { btn_update , btn_submit } from "/js/constant.js";
export function editDataPass(id)
{
    fetch('/Ticket/Admin/PEditV', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 
            id: id.value,
            data : {
                name: document.querySelector('#firstName').value, 
                firstName: document.querySelector('#lastName').value, 
                email: document.querySelector('#email').value,
                Phone: document.querySelector('#phoneNumber').value,
                dateOfBirth: document.querySelector('#date_naiss_pass').value
            }
        })
    }).then(response => response.json())
    .then(data => {
        console.log(data); // Affiche le message envoyé par PHP
        window.location.href = '/Ticket/Admin/Pass'; // Redirige vers la page
    }).catch(error => {
        console.error('Erreur AJAX :', error);
    });
}

export function deleteDataPass(id) {
    fetch('/Ticket/Admin/PDelete/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id.value })
    }).then(response => response.json())
    .then(data => {
        console.log(data); // Affiche le message envoyé par PHP
        // window.location.href = '/Ticket/Admin/Pass'; // Redirige vers la page
    })
}

export function openBoxPass(value, id = 0, edit = false) { 
    document.querySelector(value).style.display = 'flex'; 
    document.querySelector(value).value = id;
    if (edit) {
        if (title) {
            title.innerHTML = "Modification des Informations du Passager";
        }   
        fetch('/Ticket/Admin/PEdit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        }).then(response => response.json())
        .then(data => {
            console.log(data['data']); // Affiche le message envoyé par PHP
            document.querySelector('#firstName').value = data['data'].name;
            document.querySelector('#lastName').value = data['data'].firstName;
            document.querySelector('#email').value = data['data'].email;
            document.querySelector('#phoneNumber').value = data['data'].Phone;
            document.querySelector('#date_naiss_pass').value = data['data'].dateOfBirth;
        }).catch(error => {
            console.error('Erreur AJAX :', error);
        });
    }
}

