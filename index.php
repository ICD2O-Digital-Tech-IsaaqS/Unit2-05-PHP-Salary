<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Salary, with PHP" />
    <meta name="keywords" content="Immaculata, ICD2O" />
    <meta name="author" content="Isaaq Simon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io (8)/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io (8)/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io (8)/favicon-16x16.png" />
    <link rel="manifest" href="./favicon_io (8)/site.webmanifest" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-lime.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>Salary Program, with PHP</title>
  </head>
  <body>
    <div class="container">
        <h2>Salary Calculator</h2>
        <form method="post">
            <label for="hours">Hours Worked per Week:</label>
            <input type="number" name="hours" step="0.01" required>
            
            <label for="rate">Hourly Rate ($):</label>
            <input type="number" name="rate" step="0.01" required>
            
            <button type="submit">Pay</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $baseSalary = floatval($_POST["baseSalary"]);
            $hours = floatval($_POST["hours"]);
            $rate = floatval($_POST["rate"]);
            
            if ($baseSalary >= 0 && $hours > 0 && $rate > 0) {
                $weeklyWages = $hours * $rate;
                $yearlyWages = $weeklyWages * 52;
                $totalYearlyIncome = $baseSalary + $yearlyWages;
                $tax = $totalYearlyIncome * 0.2005;
                $netPay = $totalYearlyIncome - $tax;
                $weeklyNetPay = $netPay / 52;
                
                echo "<h3>Results:</h3>";
                echo "Weekly Net Pay: $" . number_format($weeklyNetPay, 2) . "<br>";
                echo "Government Tax: $" . number_format($tax / 52, 2) . " per week";
            } else {
                echo "<h3>Please enter valid numbers.</h3>";
            }
        }
        ?>
    </div>
</body>
</html>
