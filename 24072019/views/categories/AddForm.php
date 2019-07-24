<form action="<?=$targetURL?>" method="post" class="form-group">
    <input type="text" name="name" placeholder="name" class="form-control">
    <textarea name="description" class="form-control" placeholder="description"><?$row['description']?></textarea>    
    <input type="submit" value="Отправить!!!" class='btn btn-primary'>
</form>