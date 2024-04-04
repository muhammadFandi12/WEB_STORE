$(document).ready(function(){
    // Login Form Submission
    $('#login').submit(function(e){
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        // Validasi sederhana
        if(email === '' || password === ''){
            alert('Please enter email and password.');
            return false;
        }

        // Kirim data ke skrip PHP untuk login
        $.ajax({
            type: 'POST',
            url: 'php/login_script.php', // Perbaiki path ke skrip PHP untuk login
            data: {email: email, password: password}, 
            success: function(response){
                if(response.trim() === 'success'){
                    alert('Login successful');
                    window.location.href = 'index.html'; // Redirect ke halaman dashboard setelah login sukses
                } else {
                    alert('Invalid email or password.');
                }
            }
        });
    });




    // Registration Form Submission
    $("#register").submit(function(event) {
        event.preventDefault(); 

        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            success: function(response) {
                if (response === "success") {
                    alert("Registration successful!");
                    window.location.href = "login.html";
                } else if (response === "email_exists") {
                    alert("Email already exists. Please choose another email.");
                } else {
                    alert("An error occurred. Please try again later.");
                }
            },
            error: function() {
                alert("An error occurred. Please try again later.");
            }
        });
    });
});
