<?php


include 'models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct($db)
    {
        $this->productModel = new Product($db);
    }

    public function index()
    {
        try {
            $products = $this->productModel->getAllProducts();
            include 'views/products.php'; 
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if ($this->productModel->createProduct($name, $description, $price, $category)) {
                    header("Location: index.php");
                } else {
                    echo 'Error creating product.';
                }
            } catch (Exception $e) {
                echo 'Exception: ' . $e->getMessage();
            }
        } else {
            include 'views/create_product.php'; // Load the create product form
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            try {
                if ($this->productModel->deleteProduct($id)) {
                    header("Location: index.php");
                } else {
                    echo 'Error deleting product.';
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    public function details()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            try {
                $product = $this->productModel->getProductById($id);
                if ($product) {
                    // Display product details page
                    include 'views/product_details.php';
                } else {
                    echo 'Product not found.';
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            try {
                $product = $this->productModel->getProductById($id);
                if ($product) {
                    include 'views/edit_product.php';
                } else {
                    echo 'Product not found.';
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            
            try {
                if ($this->productModel->updateProduct($id, $name, $description, $price, $category)) {
                    // Redirect to the product list after successful update
                    header('Location: /interview-framework/index.php?route=index');
                    exit();
                } else {
                    echo 'Error updating product.';
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
    

}