<?php
session_start();

function isLoggedIn()
{
    if (isset($_SESSION['email']) && isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}