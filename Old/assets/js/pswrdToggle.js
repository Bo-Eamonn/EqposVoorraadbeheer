const pswrdToggle = document.querySelector('#pswrdToggle');
const pswrd = document.querySelector('#pswrd');

pswrdToggle.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = pswrd.getAttribute('type') === 'password' ? 'text' : 'password';
    pswrd.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('bi-eye-slash');
});