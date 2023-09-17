<?php
function checkSignupSubmission()
{
    if (isset($_SESSION['signupErrors'])) {
        foreach ($_SESSION['signupErrors'] as $value) {
            echo "<p class='formError'> $value</p>";
        }
        unset($_SESSION['signupErrors']);
    }
    if (isset($_SESSION['isSignup'])) {
        echo "<p class='formSuccess'>Signup Successfull!</p>";
        unset($_SESSION['isSignup']);
    }
}

?>