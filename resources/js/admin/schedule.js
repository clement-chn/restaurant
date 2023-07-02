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
