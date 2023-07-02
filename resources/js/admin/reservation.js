// Faire apparaitre les croix et le bouton enregister

const deleteBtn = document.getElementById('delete-btn');

const crosses = [];
let i = 0;
let cross = document.getElementById(`cross-${i}`);

while (cross) {
  crosses.push(cross);
  i++;
  cross = document.getElementById(`cross-${i}`);
}

const input = document.getElementById('clickedButton');

crosses.forEach((cross) => {
  cross.addEventListener('click', () => {
    event.preventDefault();
    cross.classList.toggle('opacity-100');

    // Avoir le numéro du bouton
    const str = cross.id;
    const btnNumber = parseInt(str.substring(str.indexOf("cross-") + 6));

    // Changer la value de l'input
    if (input.value.includes(btnNumber)) {
      console.log('oui ça inclut');
      const oldValue = input.value;
      const newValue = oldValue.replace(btnNumber, "");
      input.value = newValue;
    } else {
      input.value = input.value + " " + btnNumber;
    }

    
    if (cross.classList.contains('opacity-100')) {
        deleteBtn.classList.remove('hidden');
      } 
    else {

        let isBtnVisible = false; 

        crosses.forEach((cross) => {
            if (cross.classList.contains('opacity-100')) {
                isBtnVisible = true;
            }
        })

        if (!isBtnVisible)
        deleteBtn.classList.add('hidden');
        }
    });
});

// Faire apparaitre le bouton "changer de date"

const dateBtn = document.getElementById('date-btn');
const dateField = document.getElementById('datefield');
const container = document.getElementById('datefield-container');
const form = document.getElementById('form');

dateField.addEventListener('change', () => {
  dateBtn.classList.remove('hidden');
  container.classList.remove('self-center');
  form.classList.remove('flex-col');
  container.classList.add('basis-2/3', 'flex', 'justify-end');
})
  

