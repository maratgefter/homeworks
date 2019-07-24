<form action="<?=$targetEditURL?>" method="post" class="form-group">
    <input type="text" name="name" value="<? echo $row['name']; ?>" class="form-control">
    <textarea name="description" class="form-control"><? echo $row['description']; ?></textarea>
    <input type="text" name="price" value="<? echo $row['price']; ?>" class="form-control">
    <input type="text" name="count" value="<? echo $row['count']; ?>" class="form-control">
    <input type="text" name="img" value="<? echo $row['img']; ?>" class="form-control">
    <input type="text" name="categories_id" value="<? echo $row['categories_id']; ?>" class="form-control">
    <input type="submit" value="Отправить!!!" class="btn btn-primary">
</form>