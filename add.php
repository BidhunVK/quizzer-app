<?php

require "Database.php";

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $question_number = $_POST['question-number'];
    $question_text = $_POST['question-text'];
    $correct_choice = $_POST['correct-choice'];

    //choices array
    $choices = [];
    $choices[0] = mysqli_real_escape_string($mysqli, $_POST['choice1']);
    $choices[1] = mysqli_real_escape_string($mysqli, $_POST['choice2']);
    $choices[2] = mysqli_real_escape_string($mysqli, $_POST['choice3']);
    $choices[3] = mysqli_real_escape_string($mysqli, $_POST['choice4']);
    $choices[4] = mysqli_real_escape_string($mysqli, $_POST['choice5']);


    $sql = "INSERT INTO questions (question_number, text)
    VALUES ('$question_number', '$question_text')";

    $insert_row = $mysqli->query($sql) or die($mysqli->error);

    //validate the insert
    if ($insert_row) {

        foreach ($choices as $choice => $value) {

            if ($value != '') {

                if ($correct_choice == $choice) {
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }
                $sql = "INSERT INTO choices (question_number, is_correct, text)
                        VALUES ('$question_number', '$is_correct', '$value')";

                $insert_row =$mysqli->query($sql) or die($mysqli->error);

                if($insert_row){
                    continue;
                }
                else{
                    die("An error occured".$mysqli->error);
                }
            }
            $message = 'question has been added';
        }
    }
}
/**
 * Get total number of questions
 */
$sql = "SELECT COUNT(*)
FROM questions
GROUP BY question_number";

$total_questions = $mysqli->query($sql)->num_rows;
$next = $total_questions+1;

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
            <h2>Add question</h2>
            <?php if(isset($message)): ?>
                <p><?=$message; ?></p>
                <?php endif; ?>
            <form action="add.php" method="post">
                <p>
                    <label for="">Question number</label>
                    <input type="number" name="question-number" value="<?= $next ?>">
                </p>

                <p>
                    <label for="">Question Text</label>
                    <input type="text" name="question-text">
                </p>

                <p>
                    <label for="">Choice 1:</label>
                    <input type="text" name="choice1">
                </p>
                <p>
                    <label for="">Choice 2:</label>
                    <input type="text" name="choice2">
                </p>
                <p>
                    <label for="">Choice 3:</label>
                    <input type="text" name="choice3">
                </p>
                <p>
                    <label for="">Choice 4:</label>
                    <input type="text" name="choice4">
                </p>
                <p>
                    <label for="">Choice 5:</label>
                    <input type="text" name="choice5">
                </p>
                <p>
                    <label for="">Correct choice number</label>
                    <input type="number" name="correct-choice">
                </p>
                <p>
                    <button type="submit">Submit</button>
                </p>
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