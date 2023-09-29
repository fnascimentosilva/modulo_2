<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container{
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
   

    <form class="container" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label>Nome do funcionário:</label>
        <input type="text" placeholder="Digite o nome do funcionário" name="name">
        <br>
        <label>Início das férias:</label>
        <input type="date" name="start_date">
        <br>
        <label>Fim das férias:</label>
        <input type="date" name="end_date">
        <br>

        <button type="submit">Gerar</button>
    </form>
</body>

</html>