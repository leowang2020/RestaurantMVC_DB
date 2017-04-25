<?php
$hasCategories = isset($categories);
if ($hasCategories === false) {
    echo '<h1>views/add_food_view.php needs $categories</h1>';
    exit();
}
?>

<h1>Add Food Page</h1>
<div id="main">
    <form action="?controller=admin&action=add_food" method="post">
        <input type="hidden" name="action" value="add_food" />

        <label>Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category->getID(); ?>">
                    <?php echo $category->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>IMGID:</label>
        <input type=text" name="imgID" /> 
        <br />
        <label>Name:</label>
        <input type=text" name="food_name" /> 
        <br />
        <label>Price:</label>
        <input type=text" name="food_price" /> 
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Add Food" name="addfood_submitted" /> 
        <br />
    </form>
</div>