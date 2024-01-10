<?php
session_start();

function isLoggedIn()
{
    if (isset($_SESSION['email']) && isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
        return true;
    } else {
        return false;
    }
}