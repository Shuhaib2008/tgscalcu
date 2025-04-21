<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
       body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            width: 300px;
        }

        .calculator h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .calculator input,
        .calculator select,
        .calculator button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .calculator button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .calculator button:hover {
            background-color: #45a049;
        }

        .result-box {
            margin-top: 15px;
            font-weight: bold;
            color: #222;
        } 
    </style>

<body>
    <div class="calculator">
        <h2>kalkulator sederhana</h2>
        <form method="post">
            <input type="number" step="any" name="num1" required
            placeholder="angka pertama">
            <select name="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="number" step="any" name="num2" required
            placeholder="angka kedua">
            <button type="submit" name="calculate">hitung</button>
        </form>
        <?php
        if (isset($_POST['calculate'])) {
            $num1 = (float) $_POST['num1'];
            $num2 = (float) $_POST['num2'];
        $operator = $_POST['operator'];
        $result = '';

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    if ($num2 == 0) {
                        $result = "Error: pemabgian dengan nol!";
                    } else {
                        $result = $num1 / $num2;
                    }
                    break;
                    default:
                    $result = "operator tidak valid";
                    break;
        }
        echo "<div class='result-box'>hasil: $result</div>";
        }
        ?>
    </div>
    
</body>
</html>