<?php
include 'config.php'; 
include 'controllers/ProductController.php'; 

$productController = new ProductController($db);


$route = isset($_GET['route']) ? $_GET['route'] : 'index';

switch ($route) {
    case 'index':
        $productController->index();
        break;
    case 'create':
        $productController->create();
        break;
    case 'edit':
        $productController->edit();
        break;
    case 'update':
        $productController->update();
        break;
    case 'delete':
        $productController->delete();
        break;
    case 'details':
        $productController->details();
        break;
}
