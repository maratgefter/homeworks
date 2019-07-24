<form action="<?=$targetEditURL?>" method="post" class="form-group">
    <input type="text" name="name" value="<? echo $row['name']; ?>" class="form-control">
    <textarea name="description" class="form-control"><? echo $row['description']; ?></textarea>
    <input type="submit" value="Отправить!!!" class="btn btn-primary">
</form>