<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deret Bilangan</title>
    <style>
        .array-container {
            display: flex;
            justify-content: center;
            margin: 20px;
        }
        .array-element {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            margin-right: 5px;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="array-container">
        <?php
        $array = [8, 2, 4, 3, 9];
        foreach ($array as $value) {
            echo "<div class='array-element'>$value</div>";
        }
        ?>
    </div>
</body>
</html>
