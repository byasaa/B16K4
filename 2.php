<?php

function usernameValidity($username)
{
    if (preg_match('/^[a-z0-9._]{8,12}+$/', $username)){
        return true;
    } else {
        echo 'Format Username Salah';
        return false;
    }
}
function passwordValidity($password)
{
    if(preg_match('/^[a-zA-Z]{9}([0-9])$/',$password)){
        return true;
    }else{
        echo 'Format Password Salah';
    }
}
echo usernameValidity('muh.abiyasa');
echo '<br>';
echo passwordValidity('abcdefghi1');