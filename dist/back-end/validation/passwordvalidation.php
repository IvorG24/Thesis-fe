<?php
  function validatePassword($password) {
    // Define your password policy here
    $minLength = 8;
    $maxLength = 20;
    $containsLetter  = preg_match('/[a-zA-Z]/', $password);
    $containsDigit   = preg_match('/\d/', $password);
    $containsSpecial = preg_match('/[^a-zA-Z\d]/', $password);

    return strlen($password) >= $minLength &&
           strlen($password) <= $maxLength &&
           $containsLetter &&
           $containsDigit &&
           $containsSpecial;
}
?>