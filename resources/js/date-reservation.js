// Date de réservation

let today = new Date();
let lastDayOfTheYear = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1;
let yyyy = today.getFullYear();

if (dd < 10) {
    dd = '0' + dd;
}

if (mm < 10) {
    mm = '0' + mm;
}

today = yyyy + '-' + mm + '-' + dd;
lastDayOfTheYear = yyyy + '-12-31';

document.getElementById('datefield').setAttribute('min', today);
document.getElementById('datefield').setAttribute('max', lastDayOfTheYear);

// Changement de date
document.getElementById('datefield').addEventListener('change', function() {
    // Récupérer la date sélectionnée
    let selectedDate = this.value;
    console.log(selectedDate);
    
    // Envoyer une requête AJAX au serveur pour récupérer les horaires
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/reservation/newdate' + selectedDate);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Mettre à jour l'affichage des horaires
            document.getElementById('datefield').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});