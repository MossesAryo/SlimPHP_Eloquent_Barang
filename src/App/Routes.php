<?php

declare(strict_types=1);


$app->get('/barang', 'App\Controller\BarangController:index');
$app->post('/barang/store', 'App\Controller\BarangController:store');
$app->put('/barang/update/{id}', 'App\Controller\BarangController:update');
$app->delete('/barang/delete/{id}', 'App\Controller\BarangController:destroy');

$app->get('/kategori', 'App\Controller\KategoriController:index');
$app->post('/kategori/store', 'App\Controller\KategoriController:store');
$app->put('/kategori/update/{id}', 'App\Controller\KategoriController:update');
$app->delete('/kategori/delete/{id}', 'App\Controller\KategoriController:destroy');

