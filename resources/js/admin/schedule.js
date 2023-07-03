// Afficher le bouton "Changer de jour"

const dayBtn = document.getElementById('day-btn');
const day = document.getElementById('dayfield');
const container = document.getElementById('dayfield-container');

day.addEventListener('change', () => {
  dayBtn.classList.remove('hidden');

  container.classList.remove('self-center');
  container.classList.add('basis-2/3', 'flex', 'justify-end');
})

// Afficher le bouton "Enregistrer les modifications"

const formContainer = document.getElementById('form-btn-container');
const selectElements = document.querySelectorAll('select:not(#dayfield)');
const checkbox = document.getElementById('closed-day-field');
const deleteBtn = document.getElementById('delete-btn');

console.log(checkbox);

selectElements.forEach((selectElement) => {
  selectElement.addEventListener('change', () => {
    if (formContainer.classList.contains('justify-center')) {
      formContainer.classList.remove('justify-center');
      formContainer.classList.add('justify-around');
      deleteBtn.classList.remove('hidden');
    }
  });
});

checkbox.addEventListener('change', () => {

  if (formContainer.classList.contains('justify-center')) {
    formContainer.classList.remove('justify-center');
    formContainer.classList.add('justify-around');
    deleteBtn.classList.remove('hidden');
  }

})

// Cacher les options -> Sinon vérification PHP!

// const firstSelect = document.getElementById('noon-open-hour-field');
// const secondSelect = document.getElementById('noon-close-hour-field');

// // Add event listener to the first select element
// firstSelect.addEventListener('change', () => {
//   // Get the selected value from the first select element
//   const selectedValue = parseInt(firstSelect.value);

//   // Hide options in the second select element based on the selected value
//   for (const option of secondSelect.options) {
//     if (parseInt(option.value) <= selectedValue) {
//       option.classList.add('hidden');
//     } else {
//       option.classList.remove('hidden');
//     }
//   }
// });
