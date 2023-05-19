const myButton = document.getElementById('myButton')
const myForm = document.querySelector('.form-wrapper')

myButton.addEventListener('click', function () {
	myButton.classList.add('d-none')
	myForm.classList.remove('d-none')
})

// myForm.querySelector('form').addEventListener('submit', function(event) {
//   event.preventDefault();
//   myButton.classList.remove('d-none');
//   myForm.classList.add('d-none');
// });