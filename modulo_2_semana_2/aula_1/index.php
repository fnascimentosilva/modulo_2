<?php 
//Exemplo de array push

$products = [];

var_dump($products);

array_push($products, 'cafe', 'pao', 'papel');

var_dump($products);


//array filter
$produtosFiltrados = array_filter($products, function($item){
return $item === 'papel';
});


echo '<br>';
echo '<br>';

echo '</pre>';

var_dump($produtosFiltrados);

//array map

$peoples = [
[
    'name' => 'Fabricio',
    'sobrenome' => 'Silva'
],

[
    'name' => 'Rosicleia',
    'sobrenome' => 'Almeida'
]
];

$novoArray = array_map(function($item){
    return [...$item, 'fullname' => $item['name']. ' '. $item['sobrenome']];
}, $peoples);

echo '<br>';
echo '<br>';
echo '</pre>';

var_dump($novoArray);



?>