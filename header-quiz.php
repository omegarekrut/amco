<!DOCTYPE html>
<html class="" lang="en">
<?php 
$dataInizio = date('2022-12-05 16:30:00');
$dataFine = date('2022-12-05 18:30:00');

include('connection.php');
include('functions.php');
    session_start(); 
    $remainingQuest = getChoice( $_SESSION['id_user']); 
    //print_r( $remainingQuest);
    if( count($remainingQuest) == 0 ){
        header("Location: ending.php");
    }
    $questionLeft = 7-count($remainingQuest);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/radio.css">
    <link rel="stylesheet" href="assets/css/style.css?=<?php rand() & 10000 ?>">
    <title>Amco</title>
    <style>
        .titoloDomande{
            display: flex;
            align-content: center;
            align-items: center;
            top:0;
            left:0;
            text-align: center;
            width: 100%;
        }
        .titoloDomande span{
            font-size: 120px;
        }
        .labelRisposte{
            font-size: 0.9rem;
            padding-left:1rem;
            padding-right:1rem;
        }
        /*.btn-outline-light {
          --bs-btn-color: #f8f9fa!important;
          --bs-btn-border-color: #f8f9fa!important;
          --bs-btn-hover-color: #000!important;
          --bs-btn-hover-bg: #f8f9fa!important;
          --bs-btn-hover-border-color: #f8f9fa!important;
          --bs-btn-focus-color: #000!important;
          --bs-btn-focus-bg: #f8f9fa!important;
          --bs-btn-focus-border-color: #f8f9fa!important;
          --bs-btn-focus-shadow-rgb: 248,249,250!important;
          --bs-btn-active-color: #000!important;
          --bs-btn-active-bg: #f8f9fa!important;
          --bs-btn-active-border-color: #f8f9fa!important;
          --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125)!important;
          --bs-btn-disabled-color: #f8f9fa!important;
          --bs-btn-disabled-bg: transparent!important;
          --bs-btn-disabled-border-color: #f8f9fa!important;
          --bs-gradient: none!important;
          }*/
    </style>
</head>

<body class="bg-black font-gotham text-white d-flex flex-column min-vh-100 position-relative">
    <main class="">
        <div class="position-relative">
            <img class="img-fluid" src="assets/img/bg-header.jpg" alt="">
            <div class="position-absolute w-100 text-center" style="top:3vh;left:0;width:100%;"> 
                <img src="assets/img/artC.png" style="max-height:6vh">
            </div>
            <div class="position-absolute w-100 h-100 center-vertical mb-0 titoloDomande">             
                <div class="w-100">
                    <span>N. </span> <span class="font-gotham-bold" id="numQuest"><?php echo $questionLeft; ?></span> 
                </div>
            </div>
        </div>