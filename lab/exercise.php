<?php

$score = '';
$number = '';

$letter_grade = '';
$description = '';

$sign = '';
$evenOdd = '';
$primeText = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $score = $_POST['score'];
    $number = $_POST['number'];
    if ($score < 0 || $score > 100) {
        $letter_grade = 'Invalid';
        $description = 'Score must be from 0 to 100.';
    } else {
        if ($score >= 90) {
            $letter_grade = 'A';
            $description = 'Excellent!';
        } elseif ($score >= 80) {
            $letter_grade = 'B';
            $description = 'Very Good!';
        } elseif ($score >= 70) {
            $letter_grade = 'C';
            $description = 'Good!';
        } elseif ($score >= 60) {
            $letter_grade = 'D';
            $description = 'Pass.';
        } else {
            $letter_grade = 'F';
            $description = 'Fail.';
        }
    }

    // Positive / Negative / Zero
    if ($number > 0) {
        $sign = 'Positive';
    } elseif ($number < 0) {
        $sign = 'Negative';
    } else {
        $sign = 'Zero';
    }

    // Even / Odd
    if ($number % 2 == 0) {
        $evenOdd = 'Even';
    } else {
        $evenOdd = 'Odd';
    }

    // Prime check 
    if ($number <= 1) {
        $primeText = 'Not Prime';
    } else {
        $isPrime = true;
        $i = 2;
        while ($i < $number) {
            if ($number % $i == 0) {
                $isPrime = false;
                break;
            }
            $i++;
        }

        if ($isPrime == true) {
            $primeText = 'Prime';
        } else {
            $primeText = 'Not Prime';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Exercise #1</title>
</head>
<body>
    <h2>Lab Exercise #1</h2>

    <form method="post">
        <label>Enter Score (0-100): </label>
        <input type="number" name="score" min="0" max="100" required value="<?php echo htmlspecialchars((string)$score); ?>">
        <br><br>

        <label>Enter Number: </label>
        <input type="number" name="number" required value="<?php echo htmlspecialchars((string)$number); ?>">
        <br><br>

        <button type="submit">Check</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
        <hr>
        <h3>Grade Result</h3>
        <p>Score: <?php echo htmlspecialchars((string)$score); ?></p>
        <p>Grade: <?php echo $letter_grade; ?></p>
        <p>Message: <?php echo $gradeMessage; ?></p>

        <h3>Number Classifier Result</h3>
        <p>Number: <?php echo htmlspecialchars((string)$number); ?></p>
        <p>Sign: <?php echo $sign; ?></p>
        <p>Type: <?php echo $evenOdd; ?></p>
        <p>Prime Check: <?php echo $primeText; ?></p>
    <?php } ?>
</body>
</html>
