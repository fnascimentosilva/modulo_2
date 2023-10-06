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
    if (isset($_POST['name']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {
        $nome = $_POST['name'];
        $inicio_ferias = $_POST['start_date'];
        $fim_ferias = $_POST['end_date'];

    ?>

        <div class="container">
            <p>Nome do funcionário: <?php echo $nome ?></p>
            <p>Data de início: <?php echo $inicio_ferias ?></p>
            <p>Data final: <?php echo $fim_ferias ?></p>
        </div>
    <?php
    } else {
        echo "Aguardando o preenchimento das informações";
    }
    ?>
</body>
</html>