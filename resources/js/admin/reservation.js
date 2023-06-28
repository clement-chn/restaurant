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

crosses.forEach((cross) => {
  cross.addEventListener('click', () => {
    event.preventDefault();
    cross.classList.toggle('opacity-100');

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

dateField.addEventListener('change', () => {
  dateBtn.classList.remove('hidden');
})

console.log(dateField);
  

