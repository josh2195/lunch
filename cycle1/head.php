<?php
/**
 * Created by PhpStorm.
 * User: joshe
 * Date: 9/15/2019
 * Time: 9:19 PM
 */
session_start();
$currentfile = basename($_SERVER['PHP_SELF']); //get current filename
$rightnow = time(); //set current time

//turn on error reporting for debugging - Page 699
error_reporting(E_ALL);
ini_set('display_errors','1'); //change this after testing is complete

//set the time zone
ini_set( 'date.timezone', 'America/New_York');
date_default_timezone_set('America/New_York');

//require_once "connect.php";
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Lunch Decision Maker</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<header>
    <h1>What's For Lunch?</h1>
</header>
<main>
    <h2>This website is designed to help you choose where you are going to eat lunch based on choices that you enter!</h2>
