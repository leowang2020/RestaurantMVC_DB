<?php

class CategoryRepository {

    public static function getCategories() {
        global $db;
        $query = "SELECT * FROM categories ORDER BY categoryID";
        $result = $db->query($query);
        $categories = array();
        foreach ($result as $row) {
            $category = new Category($row['categoryID'], $row['categoryName']);
            $categories[] = $category;
        }
        return $categories;
    }

    public static function getCategory($category_id) {
        global $db;
        $query = "SELECT * FROM categories WHERE categoryID = $category_id";
        $result = $db->query($query);
        $row = $result->fetch();
        $category = new Category($row['categoryID'], $row['categoryName']);
        return $category;
    }   
}
