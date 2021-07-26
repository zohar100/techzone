<?php

namespace app;

use app\models\Product;
use PDO;

class Database
{
    public \PDO $pdo;
    public static Database $db;

    public function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=products_crud_php';
        $username = 'root';
        $password = '';
        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        self::$db = $this;
    }

    public function getProducts($search = '')
    {
        if ($search) {
            $statement = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
            $statement->bindValue(':title', "%$search%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct(Product $product)
    {
        $statment = $this->pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
        VALUES (:title, :image, :description, :price, :date)");
        $statment->bindValue(':title', $product->title);
        $statment->bindValue(':image', $product->imagePath);
        $statment->bindValue(':description', $product->description);
        $statment->bindValue(':price', $product->price);
        $statment->bindValue(':date', date('Y-m-d H:i:s'));
        $statment->execute();
    }

    public function updateProduct(Product $product)
    {
        $statment = $this->pdo->prepare("UPDATE products SET title = :title, image = :image,
        description = :description, price = :price WHERE id = :id");
        $statment->bindValue(':title', $product->title);
        $statment->bindValue(':image', $product->imagePath);
        $statment->bindValue(':description', $product->description);
        $statment->bindValue(':price', $product->price);
        $statment->bindValue(':id', $product->id);
        $statment->execute();
    }

    public function deleteProduct($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}
