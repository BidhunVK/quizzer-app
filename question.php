<?php require "database.php" ?>

<?php

//get question number

$number = (int)$_GET['n'];

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
            <div class="current">Question 1 of 5</div>
            <p class="question"><?= $question['text'] ?></p>

            <form action="process.php" method="post">

                <ul class="choices">
                    <?php while($choice = $choices->fetch_assoc()): ?>
                        <!-- <?= var_dump($choice) ?> -->
                    <li><input type="radio" name="choices" value="<?= $choice['id'] ?>"><?=$choice['text']?></li>
                    <?php endwhile; ?>
                </ul>
                <input type="button" value="submit">
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