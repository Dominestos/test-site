<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$dir = scandir('../upload/');
$result = '';

if (!empty($_POST)) {
    $result = deleteFiles($dir);
}
?>
<section>
    <div class="p-3 mb-2 bg-body text-body">
        <a href="/gallery/create" style="text-decoration: none">Добавить фото в Галерею</a>
    </div>
</section>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<section>
    <div class="p-3 mb-2 bg-body text-body">
        <?php foreach ($dir as $key => $name):
        $fileDir = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $name;
        if (is_file($fileDir)):?>
        <div class="card" style="width: 18rem; margin-left: auto; margin-right: auto; margin-top: 2%; margin-bottom: 2%;">
            <img src="<?='../upload/' . $name;?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=date('d-m-Y H:i', filectime($fileDir));?></h5>
                <p class="card-text">Для удаления картинки выделите её, затем нажмите кнопку "Удалить"</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="<?='image' . $key?>" value="<?=$name;?>" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Выделить</label>
                </div>
            </div>
        </div>
        <?php endif;
        endforeach; ?> 
    </div>
</section>
<section>
    <div class="p-3 mb-2 bg-body text-body">
        <div class="form-check" style="margin-left: 2%">
            <input class="form-check-input" type="checkbox" name="imageAll" value="deleteAll" id="flexCheckDefaultAll">
            <label class="form-check-label" for="flexCheckDefaultAll">Удалить всё</label>
            <button action="<?=$_SERVER['PHP_SELF']?>" class="btn btn-primary" type="submit" style="margin-left: 4%">Удалить</button>
        </div>
        
    </div>
</section>
</form>
<p><?=$result ?></p>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';?>