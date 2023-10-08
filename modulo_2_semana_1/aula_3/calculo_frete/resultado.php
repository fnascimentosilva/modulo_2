<!DOCTYPE html>
<html lang="pt-br">

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
    <?php

    $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
    $distancia = filter_input(INPUT_POST, 'distancia', FILTER_VALIDATE_FLOAT);

    if (!$peso || !$distancia) {
        header('Location: index.php?error=true');
    }
    $peso = $_POST['peso'] * 0.8;
    $distancia = $_POST['distancia'] * 0.2;
    $total_frete = $peso + $distancia;

    ?>

    <div class="container">
        <p>Valor Total do frete: <?php echo $total_frete ?> R$</p>

    </div>




</body>

</html>