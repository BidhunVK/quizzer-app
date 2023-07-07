<?php require "database.php" ?>

<?php

session_start();
//get question number

$number = (int)$_GET['n'];
// var_dump($number);
//get question

$sql = "SELECT *
        FROM questions
        WHERE question_number = $number";

$result = $mysqli->query($sql);

$question = $result->fetch_assoc();

/**
 * Get choices
 */
$sql = "SELECT *
        FROM choices
        WHERE question_number = $number";

$choices = $mysqli->query($sql);

$query = "SELECT COUNT(*)
FROM questions
GROUP BY question_number";

$total_questions = $mysqli->query($query)->num_rows;

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
            <div class="current">Question <?=$question['question_number'] ?> of <?=$total_questions ?></div>
            <p class="question"><?= $question['text'] ?></p>

            <form action="process.php" method="post">

                <ul class="choices">
                    <?php while($choice = $choices->fetch_assoc()): ?>
                    <li><input type="radio" name="choice" value="<?= $choice['id'] ?>"><?=$choice['text']?></li>
                    <?php endwhile; ?>
                </ul>
                <input type="hidden" name="number" value="<?= $number; ?>">
                <input type="submit" value="submit">
            </form>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright $copy; 2023, PHP Quizzer
        </div>
    </footer>

</body>

</html>