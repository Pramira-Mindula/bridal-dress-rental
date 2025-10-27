//check T&C agree or not
function validateForm() {
    var termsCheckbox = document.getElementById("terms");
    if (!termsCheckbox.checked) {
        alert("You must agree to the terms and conditions.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

// Show the modal
function showModal() {
    document.getElementById("myModal").style.display = "block";
}

// Close the modal
function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

// Close the modal if clicked outside of the content
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// psw
function validateForm() {
    var termsCheckbox = document.getElementById("terms");
    var password = document.getElementById("password").value;
    var rePassword = document.getElementById("repassword").value;
    var phone = document.getElementById("phone").value;
    var dob = document.getElementById("DOB").value;
    var name = document.getElementById("name").value;

    if (!termsCheckbox.checked) {
        alert("You must agree to the terms and conditions.");
        return false; // Prevent form submission
    }

    if (password !== rePassword) {
        alert("Passwords do not match. Please try again.");
        return false; // Prevent form submission
    } 
    else if(!/^\d{10}$/.test(phone)) {
        alert("Contact number should have 10 numbers.");
        return false; // Prevent form submission
    } 
    else if(!/^[A-Za-z\s]+$/.test(name)) {
        alert("Invalid name");
        return false; // Prevent form submission
    }


    var dobDate = new Date(dob);  // Convert the string to a Date object
    var currentYear = new Date().getFullYear();
    var dobYear = dobDate.getFullYear();  // Extract the year from the Date object

    if (dobYear < 1920 || dobYear > 2020) {
        alert("Date of birth should be between 1950 and 2020.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
    }
