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

// Changer les horaires

document.getElementById('datefield').addEventListener('change', function() {
    let selectedDate = this.value;
    
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/reservation/' + selectedDate);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);

            function updateScheduleButtons(Schedules, idPrefix) {
                const scheduleButtons = document.querySelectorAll(`[id^="${idPrefix}"]`);

                scheduleButtons.forEach((button) => {
                  button.textContent = '';
                });
              
                if (scheduleButtons.length < Schedules.length) {
                  for (let i = scheduleButtons.length; i < Schedules.length; i++) {
                    const button = document.createElement('button');
                    button.type = 'button';
                    button.name = 'time';
                    button.value = Schedules[i];
                    button.className = 'bg-gold w-16 p-3 text-white m-2 rounded';
                    button.textContent = Schedules[i];
                    button.id = `${idPrefix}${i}`;
                    const divToAdd = document.querySelector(`[id^="${idPrefix}"]`).parentNode;
                    divToAdd.appendChild(button);
                  }
                } else if (scheduleButtons.length > Schedules.length) {
                  for (let i = scheduleButtons.length-1; i >= Schedules.length; i--) {
                    scheduleButtons[i].remove();
                  }
                }
    
                Schedules.sort();

                scheduleButtons.forEach((button, index) => {
                  button.textContent = Schedules[index];
                  button.type = 'button';
                });
            }

            updateScheduleButtons(data['eveningSchedules'], 'evening-schedule-');
            updateScheduleButtons(data['noonSchedules'], 'noon-schedule-');

            if(data['dontDisplay']) {
                document.getElementById('schedule-display').classList.add("hidden");
                if (!document.getElementById('message').classList.contains("hidden")) {
                } else {
                    document.getElementById('message').classList.remove("hidden");
                }
            } else {
                document.getElementById('schedule-display').classList.remove("hidden");
                document.getElementById('message').classList.add("hidden");
            }
        }
    };
    xhr.send();
});

// Bouton cliqué

// const scheduleButtonsClick = document.getElementsByClassName('btn');
// console.log(scheduleButtonsClick);

// scheduleButtonsClick.addEventListener('click', () => {
//   scheduleButtonsClick.classList.toggle('bg-chocolate');
// })

