<?php 
session_start();
$dataInizio = date('2022-12-05 16:30:00');
$dataFine = date('2022-12-05 18:30:00');
?><!DOCTYPE html>
<html class="" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/radio.css">
    <link rel="stylesheet" href="assets/css/style.css?=<?php rand()&10000 ?>">
    <title>Amco</title>
</head>

<body class="bg-black font-gotham text-white position-relative">
    <main class="d-flex min-vh-100 align-content-stretch flex-column">
        <div class="mb-2">
            <img class="img-fluid" src="assets/img/bg.jpg" alt="">
        </div>