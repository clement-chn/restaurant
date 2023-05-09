const scheduleButtons = document.querySelectorAll('button[name="time"]');
const scheduleInput = document.getElementById('time-clicked-input');
let selectedButton = null;

scheduleButtons.forEach(scheduleButton => {
  scheduleButton.addEventListener('click', function(event) {
    let button = event.target;
    if (selectedButton && selectedButton !== button) {
      selectedButton.className = 'bg-gold w-16 p-3 text-white m-2 rounded';
      selectedButton.name = "time";
    }
    if (button.name === "time-clicked") {
      console.log('le bouton est dé-sélectionné');
      button.className = 'bg-gold w-16 p-3 text-white m-2 rounded';
      button.name = "time";
      scheduleInput.value = "";
      selectedButton = null;
    } else {
      console.log('le bouton est sélectionné');
      button.className = 'bg-chocolate w-16 p-3 text-white m-2 rounded';
      button.name = "time-clicked";
      scheduleInput.value = button.value;
      selectedButton = button;
    }
  });
});

  