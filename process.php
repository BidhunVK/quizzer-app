<?php

require "database.php";
session_start();

// check to see the score is set or not

if (!isset($_SESSION['score'])) {

    $_SESSION['score'] = 0;
}

if ($_POST) {

    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number + 1;
    /**
     * Get correct choice
     */
    $sql = "SELECT COUNT(*)
    FROM questions
    GROUP BY question_number";

    $total_questions = $mysqli->query($sql)->num_rows;
    /**
     * Get correct choice
     */
    $sql = "SELECT *
            FROM choices
            WHERE question_number = $number AND is_correct = 1";

    //Get result
    $result = $mysqli->query($sql) or die($mysqli->error . __LINE__);
    //Get row
    $row = $result->fetch_assoc();
    $correct_choice = $row['id'];

    if ($correct_choice == $selected_choice) {

        $_SESSION['score']++;
    }

    if ($total_questions == $number) {
        header("Location: /final.php");
        exit;
    } else {

        header("Location: question.php?n=" . $next);
    }
}
