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
    Ola mundo

    <?php
    $nome = "fabricio";
    $idade = 36;
    ?>

    <?php echo "Meu nome é $nome e tenho $idade anos" ?>

    
</body>

</html>