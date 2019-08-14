<form action="<?=$targetEditURL?>" method="post" class="form-group" enctype="multipart/form-data">
    <input type="text" name="name" value="<? echo $row['name']; ?>" class="form-control">
    <textarea name="description" class="form-control"><? echo $row['description']; ?></textarea>
    <input type="text" name="price" value="<? echo $row['price']; ?>" class="form-control">
    <input type="text" name="count" value="<? echo $row['count']; ?>" class="form-control">
    <input type="file" name="img" class="form-control">
    <select name="categories_id">
        <?php
            foreach($categories as $value) {
                echo "<option value='$value[id]'>$value[name]</option>";
            }
        ?>
    </select>
    <input type="submit" value="Отправить!!!" class="btn btn-primary">
</form>