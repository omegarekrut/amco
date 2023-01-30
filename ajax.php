<?php
    include('connection.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    $id_user = $_SESSION['id_user'];

    if (isset($_POST['user_info'])) {
        $sql = "";
        $result = $conn->query($sql);
    }

    if (isset($_POST['question'])) {        
        $answer = $_POST['answer'];
         $sql = "UPDATE choice 
                SET id_answer = $answer,
                    outwhen = CURRENT_TIMESTAMP()
                WHERE id_user = $id_user and id_question = $_POST[question] ";
        $result = $conn->query($sql);
        $nextQuestion = $_POST['question']+1;
         $sql = "UPDATE choice 
                SET enterwhen = CURRENT_TIMESTAMP()
                WHERE id_user = $id_user and id_question = $nextQuestion ";
        $result = $conn->query($sql);
    }

    if (isset($_POST['end_quiz'])) {
        $sql = "";
        $result = $conn->query($sql);
    }
?>