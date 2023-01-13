<?php

//переделываем массив с загружаемыми файлами:

function reArray(array $array)
{
    $funcArray = [];
    $fileCount = count($array['name']);
    $fileKeys = array_keys($array);
    for ($i = 0; $i < $fileCount; $i++) {
        foreach ($fileKeys as $key) {
            $funcArray[$i][$key] = $array[$key][$i];
        }
    }
    return $funcArray;
}

//проверка количества файлов
function countCheck($array)
{
    return count($array) < 5 ? true : false;

}

//проверка типа файла
function checkfileType($array, array $fileTypes = ['image/jpeg', 'image/png', 'image/jpg'])
{
    return !in_array($array['type'], $fileTypes) ? false : true;
}

//проверка лимита размера файла
function checkfileSize($array, $filesizelimit = 2000000)
{
    return $array['size'] >= $filesizelimit ? false : true;
}

//загрузка файла в локальную папку
function movedFilesInDir($file)
{
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
    $extensionName = '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = time() . $file['size'] . $extensionName;

    return move_uploaded_file($file['tmp_name'], $uploadPath . $fileName);
}

function fullUploadFiles($files)
{
    $uploadError = null;
    $uploadFiles = reArray($files);
    if (countCheck($uploadFiles) === false) {
        $uploadError[] = 'Нельзя загружать больше 5 файлов';
    } else {
        foreach ($uploadFiles as $file ) {
            $uploadError = null;
            if (checkfileType($file) === false) {
                $uploadError[] = 'Неверное расширение файла ' . $file['name'];
            } elseif (checkfileSize($file) === false) {
                $uploadError[] = 'Размер файла ' . $file['name'] . ' превышает лимит в 2мб';
            }

            if (empty($uploadError)) {
                if (movedFilesInDir($file) === false) {
                    $uploadError[] = 'Не удалось переместить файл ' . $file['name'];
                }
            }
        }
    }
    return (empty($uploadError)) ? ['Фотографии успешно загруженны'] : $uploadError;
}

