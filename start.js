const form = document.querySelector('form');
const nameInput = document.querySelector('#name');
const houseColorInput = document.querySelector('#houseColor'); // Changed from houseNameInput to houseColorInput
const emailInput = document.querySelector('#email');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  const name = nameInput.value;
  const houseColor = houseColorInput.value; // Changed from houseName to houseColor
  const email = emailInput.value;

  // Validate the form inputs
  if (!name || !houseColor || !email) {
    alert('Please fill in all fields');
    return;
  }

  // Perform any necessary actions with the form data, such as sending it to a server
  // ...

  // Clear the form inputs
  nameInput.value = '';
  houseColorInput.value = ''; // Changed from houseNameInput to houseColorInput
  emailInput.value = '';

  // Redirect based on the selected house color
  if (houseColor === 'orange') {
    window.location.href = 'orange.html';
  } else if (houseColor === 'white') {
    window.location.href = 'white.html';
  } else if (houseColor === 'green') {
    window.location.href = 'green.html';
  }

  // Provide feedback to the user, such as a success message
  alert('Your voting information has been submitted successfully!');
});