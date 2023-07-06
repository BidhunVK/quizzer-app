<?php require "database.php" ?>

<?php

/**
 * Get total number of questions
 */

 $sql = "SELECT COUNT(*)
        FROM questions
        GROUP BY question_number";

$total_questions = $mysqli->query($sql)->num_rows;
// var_dump($results);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

    <head>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </head>
    <main>
        <div class="container">
            <h2>Test your PHP knowledge</h2>
            <p>This is a multiple choice quiz to test your knowledge of PHP</p>
            <ul>
                <li><strong>Number of questions : </strong><?= $total_questions  ?></li>
                <li><strong>Type : </strong>multiple choice</li>
                <li><strong>Estimated Time : </strong><?= $total_questions * 0.5 ; ?> Minutes</li>
            </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright $copy; 2023, PHP Quizzer
        </div>
    </footer>

</body>

</html>