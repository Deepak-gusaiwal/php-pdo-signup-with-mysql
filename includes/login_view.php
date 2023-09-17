<?php 
function checkLoginSubmission(){
    if(isset($_SESSION['loginErrors'])){
        $loginErrors = $_SESSION['loginErrors'];
        foreach ($loginErrors as $key => $value) {
            echo "<p class='formError'> $value</p>";
        }
        unset($_SESSION['loginErrors']);
    }
    if (isset($_SESSION['loginSuccess'])) {
        echo "<p class='formSuccess'>Login Successfull!</p>";
        unset($_SESSION['loginSuccess']);
    }
}