<?php

class FoodRepository {

    public static function getFoods() {
        global $db;
        $query = 'SELECT * FROM foods '
                . 'INNER JOIN categories '
                . 'ON foods.CategoryID = '
                . 'categories.CategoryID '
                . 'OREDER BY foodID';
        $result = $db->query($query);
        $foods = array();
        foreach ($result as $row) {
            $category = new Category($row['CategoryID'], $row['CategoryName']);
            $food = new Food($row['imgID'], $row['foodName'], $row['foodPrice'], $category);
            $foods[] = $food;
        }
        return $foods;
    }

    public static function getFoodsByCategory($category_id) {
        global $db;
        $category = CategoryRepository::getCategory($category_id);
        $query = "SELECT * FROM foods WHERE categoryID = $category_id ORDER BY imgID";
        $result = $db->query($query);
        $foods = array();
        foreach ($result as $row) {
            $food = new Food($row['imgID'], $row['foodName'], $row['foodPrice'], $category);
            $food->setID($row['foodID']);
            $foods[] = $food;
        }
        return $foods;
    }

    public static function getFood($food_id) {
        global $db;
        $query = "SELECT * FROM foods WHERE foodID = $food_id";
        $result = $db->query($query);
        $row = $result->fetch();
        $category = CategoryRepository::getCategory($row['categoryID']);
        $food = new Food($row['imgID'], $row['foodName'], $row['foodPrice'], $category);
        $food->setID($row['foodID']);
        return $food;
    }

    public static function deleteFood($food_id) {
        global $db;
        $query = "DELETE FROM foods WHERE foodID = $food_id";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addFood($food) {
        global $db;
        $category_id = $food->getCategory()->getID();
        $imgID = $food->getIMGID();
        $name = $food->getName();
        $price = $food->getPrice();
        $query = "INSERT INTO foods (categoryID, imgID, foodName, foodPrice)
            VALUES ('$category_id', '$imgID', '$name', '$price')";
        $row_count = $db->exec($query);
        return $row_count;
    }

}
?>

