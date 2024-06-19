<?php

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $query = $this->db->prepare("SELECT * FROM products");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($id) {
        try {
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception('Error fetching product: ' . $e->getMessage());
        }
    }
    public function createProduct($name, $description, $price, $category) {
        $query = $this->db->prepare("INSERT INTO products (name, description, price, category) VALUES (:name, :description, :price, :category)");
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':price', $price);
        $query->bindParam(':category', $category);
        return $query->execute();
    }
    public function deleteProduct($id) {
        try {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log('Error deleting product: ' . $e->getMessage());
            throw new Exception('Error deleting product: ' . $e->getMessage());
        }
    }
    public function updateProduct($id, $name, $description, $price, $category) {
        try {
            $sql = "UPDATE products SET name = :name, description = :description, price = :price, category = :category WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            throw new Exception('Error updating product: ' . $e->getMessage());
        }
    }
    
}