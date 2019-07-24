<form action="<?=$targetURL?>" method="post" class="form-group">
    <input type="text" name="name" placeholder="name" class="form-control">
    <textarea name="description" class="form-control" placeholder="description"><?$row['description']?></textarea>
    <input type="text" name="price" placeholder="price" class="form-control">
    <input type="text" name="count" placeholder="count" class="form-control">
    <input type="text" name="img" placeholder="img" class="form-control"> 
    <input type="text" name="categories_id" placeholder="categories_id" class="form-control">
    <select name="categories_id">

    </select>
    <input type="submit" value="Отправить!!!" class='btn btn-primary'>
</form>