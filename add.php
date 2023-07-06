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
            <form action="add.php" method="post">
                <p>
                    <label for="">Question number</label>
                    <input type="number" name="question-number">
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
                    <input type="submit" name="submit" value="submit">
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