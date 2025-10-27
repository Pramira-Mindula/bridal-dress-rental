// Show the modal when the "Get Bill" button is clicked
document.addEventListener("DOMContentLoaded", function () {
    const getBillBtn = document.getElementById("generateBill");
    const modal = document.getElementById("billModal");
    const closeBtn = document.querySelector(".close");

    getBillBtn.addEventListener("click", function (event) {
        event.preventDefault();
        modal.style.display = "block";
    });

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});


function validateForm() {
    var bookDate = document.getElementById("bookingDate").value;
    var returnDate = document.getElementById("returnDate").value;
    var today = new Date();
    
    // Format today's date as YYYY-MM-DD (to match input type="date" format)
    var formattedToday = today.toISOString().split('T')[0];

    if (bookDate <= formattedToday) {
        alert("Booking date must be a future date!");
        return false; // Prevent form submission
    }

    if (returnDate <= formattedToday) {
        alert("Return date must be a future date!");
        return false; // Prevent form submission
    }

    // if (returnDate <= bookDate) {
    //     alert("Return date must be after the booking date!");
    //     return false; // Prevent form submission
    // }

    return true; // Allow form submission
}
