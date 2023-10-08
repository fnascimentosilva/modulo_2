
<?php 
if(isset($_GET['error'])){
    echo "<script>alert('Preencha os dados corretamente');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo Frete</title>

    <style>
        .container {
            margin: 0 auto;
            width: 40%;
            border: 1px solid #000;
            padding: 10px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php echo $_SERVER['PHP_SELF'] ?>

    <form class="container" method="post" action="resultado.php">
    
        <label>Peso do produto:</label>
        <input type="number" name="peso">
        <br>
        <label>Distancia entrega:</label>
        <input type="number" name="distancia">
        <br>

        <button type="submit">Calcular Frete</button>
    </form>

    
</body>

</html>