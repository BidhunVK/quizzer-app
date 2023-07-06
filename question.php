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
            <p class="question">What doest PHP stands for?</p>

            <form action="process.php" method="post">

                <ul class="choices">
                    <li><input type="radio" name="choices" value="1">PHP : Hypertext Preprocessor</li>
                    <li><input type="radio" name="choices" value="1">PHP : Private Home Page</li>
                    <li><input type="radio" name="choices" value="1">PHP : Personal Hoome Page</li>
                    <li><input type="radio" name="choices" value="1">PHP : Personal Hypertext Preprocessor</li>
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