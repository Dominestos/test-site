<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
require_once __DIR__ . '/functionsForcreate/uploadlogic.php';
?>
<pre>
<?php
$renewFiles = [];


if (isset($_POST['upload'])) {
    if(!empty($_FILES)) {
        $imagearray = $_FILES['image'];
        $result = fullUploadFiles($imagearray);
    }
}
?>
</pre>
<div class="p-3 mb-2 bg-body text-body">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Выберите картинку для загрузки<br>Формат: jpeg, png, jpg. Размер файла не должен превышать 2мб<br>Количество загружаемых файлов: не более 5-ти</label>
            <input required accept=".png, .jpg, .jpeg" class="form-control" type="file" name="image[]" id="formFileMultiple" multiple>
        </div>
        <button class="btn btn-primary" type="submit" name="upload">Подтвердить</button>
        <?php if (!empty($result)) : ?>
            <?php foreach ($result as $fileresult) : ?>
            <p><?= $fileresult ?></p>
            <?php endforeach; ?>
            <a href="/gallery/" style="text-decoration: none"><br>Назад в Галерею</a>
        <?php endif; ?>
    </form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';?>