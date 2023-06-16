var nameError = document.getElementById('name-error');
var addressError = document.getElementById('address-error');
var emailError = document.getElementById('email-error');
var phoneError = document.getElementById('phone-error');
var dateError = document.getElementById('dob-error');
var messageError = document.getElementById('message-error');
var submitError = document.getElementById('submit-error');
const feedbackForm = document.querySelector('form');

function validateName() {
    var fname = document.getElementById('contact-name').value;
    if (fname.length == 0) {
        nameError.innerHTML = "Name is required";
        return false;
    }
    if (!fname.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
        nameError.innerHTML = "write full name";
        return false;
    }
    nameError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
    return true;
}
function validateAddress() {
    var address = document.getElementById('contact-address').value;
    if (address.length == 0) {
        addressError.innerHTML = "Address is required";
        return false;
    }
    if (!address.match(/^\w+,\w+,[0-9]{5}$/)) {
        addressError.innerHTML = "write full address";
        return false;
    }
    addressError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
    return true;
}
function validatePhone() {
    var phone = document.getElementById('contact-phone').value;
    if (phone.length == 0) {
        phoneError.innerHTML = "Phone is required";
        return false;
    }
    if (phone.length !== 10) {
        phoneError.innerHTML = "should be 10 digit";
        return false;
    }
    if (!phone.match(/^[0-9]{10}$/)) {
        phoneError.innerHTML = "only digits";
        return false;
    }
    phoneError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
    return true;

}
function validateEmail() {
    var email = document.getElementById('contact-email').value;
    if (email.length == 0) {
        emailError.innerHTML = "Email is required";
        return false;
    }
    //it should be alphabet may contain . _ - @ some alphabet . aphabet
    // if(!email.match(/^[A-Za-z]\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
    if (!email.match(/^\w+@\w+.\w{2}\w?$/)) {
        emailError.innerHTML = "write valid email";
        return false;
    }
    emailError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
    return true;
}

function validateMessage() {
    var message = document.getElementById('contact-message').value;
    var required = 10;
    var left = required - message.length;
    if (left > 0) {
        messageError.innerHTML = left + 'more  Characters required';
        return false;
    }
    messageError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
    return true;
}

function validateDate() {
    var birth = document.getElementById('contact-dob').value;
    var regex = /^\d{4}-\d{2}-\d{2}$/;
    if (!regex.test(birth)) {
        dateError.innerHTML = "write valid date";
        return false; // Invalid format
    }
    // get today's date in timestamp format
    let today_timestamp = Date.now();
    // converting entered data in timestamp format
    let birth_timestamp = Date.parse(birth);
    // subtracting today's date from entered date
    let diff_in_time = today_timestamp - birth_timestamp;
    if (diff_in_time < 0) {
        dateError.innerHTML = "Date of birth is not valid";
        return false;

    }
    dateError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
    return true;
}
function validateForm() {
    if ((!validateName()) || (!validatePhone()) || (!validateEmail()) || (!validateMessage()) || !validateDate()) {
        submitError.style.display = 'block';
        submitError.innerHTML = "please fix errors  to post";
        setTimeout(function () { submitError.style.display = 'none'; }, 2000);
        return false;
    }
    let message = 'Are these values correct?';
    return confirm(message);
}