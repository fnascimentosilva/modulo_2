<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartas Férias</title>

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
    if (isset($_POST['peso']) && isset($_POST['distancia'])) {
        $peso = $_POST['peso']*0.8;
        $distancia = $_POST['distancia']*0.2;
        $total_frete = $peso + $distancia;

    ?>

        <div class="container">
            <p>Valor Total do frete: <?php echo $total_frete ?> R$</p>
            
        </div>
    <?php
    } else {
        echo "Aguardando o preenchimento das informações";
    }
    ?>
</body>
</html>