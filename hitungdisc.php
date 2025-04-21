<?php
// Data awal
$pilihan_diskon = [0, 5, 10, 15, 20, 25, 30];
$harga = 0;
$diskon = 0;
$total_diskon = 0;
$total_bayar = 0;
$error = '';

// Proses saat form disubmit
if (isset($_POST['submit'])) {
    $harga = floatval($_POST['harga']);
    $diskon = isset($_POST['diskon']) ? floatval($_POST['diskon']) : 0;

    // Validasi
    if ($harga <= 0 || $diskon < 0 || $diskon > 100) {
        $error = "Harga harus lebih dari 0 dan diskon harus antara 0–100%.";
    } else {
        $total_diskon = $harga * $diskon / 100;
        $total_bayar = $harga - $total_diskon;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskon Belanja</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f7f9fb;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }
        .radio-group {
            margin-bottom: 15px;
        }
        .radio-group label {
            display: inline-block;
            margin-right: 10px;
            font-weight: normal;
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        h3 {
            margin: 10px 0;
            color: #2c3e50;
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DISKON BELANJAAN</h2>
        <form method="POST" action="">
            <label for="harga">HARGA BARANG</label>
            <input type="number" id="harga" name="harga" step="any" required value="<?php echo htmlspecialchars($harga); ?>">

            <label>DISKON (%)</label>
            <div class="radio-group">
                <?php foreach ($pilihan_diskon as $nilai_diskon): ?>
                    <label>
                        <input type="radio" name="diskon" value="<?php echo $nilai_diskon; ?>"
                            <?php echo ($diskon == $nilai_diskon) ? 'checked' : ''; ?>>
                        <?php echo $nilai_diskon; ?>%
                    </label>
                <?php endforeach; ?>
            </div>

            <button type="submit" name="submit">HITUNG</button>
        </form>

        <?php if ($error): ?>
            <h3 class="error"><?php echo $error; ?></h3>
        <?php elseif (isset($_POST['submit'])): ?>
            <h3>Harga Awal: Rp <?php echo number_format($harga, 2, ',', '.'); ?></h3>
            <h3>Diskon: <?php echo $diskon; ?>% (Rp <?php echo number_format($total_diskon, 2, ',', '.'); ?>)</h3>
            <h3>Total Bayar: Rp <?php echo number_format($total_bayar, 2, ',', '.'); ?></h3>
        <?php endif; ?>
    </div>
</body>
</html>
