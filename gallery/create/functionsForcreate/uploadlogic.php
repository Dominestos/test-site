<?php

//переделываем массив с загружаемыми файлами $_FILES[]:

function reArray(array $array): array
{
    $funcArray = [];
    foreach ($array as $infKey => $files) {
        foreach ($files as $key => $value) {
            $funcArray[$key][$infKey] = $array[$infKey][$key];
        }
    }
    return $funcArray;
}

//проверка количества файлов
function countCheck(array $array): bool
{
    return (count($array) < 5);

}

//проверка типа файла
function checkfileType(array $array, array $fileTypes = ['image/jpeg', 'image/png', 'image/jpg']): bool
{
    return (in_array($array['type'], $fileTypes));
}

//проверка лимита размера файла
function checkfileSize(array $array, int $filesizelimit = 2000000): bool
{
    return ($array['size'] <= $filesizelimit);
}

//загрузка файла в локальную папку
function movedFilesInDir($file)
{
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
    $extensionName = '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = time() . $file['size'] . $extensionName;

    return move_uploaded_file($file['tmp_name'], $uploadPath . $fileName);
}

function fullUploadFiles(array $files)
{
    $uploadError = null;
    $uploadFiles = reArray($files);
    if (countCheck($uploadFiles) === false) {
        return ['Нельзя загружать больше 5 файлов'];
    }
    foreach ($uploadFiles as $file) {
        $uploadError = null;
        if (checkfileType($file) === false) {
            $uploadError[] = 'Неверное расширение файла ' . $file['name'];
        } elseif (checkfileSize($file) === false) {
            $uploadError[] = 'Размер файла ' . $file['name'] . ' превышает лимит в 2мб';
        }
    }
    if (empty($uploadError) && (movedFilesInDir($file) === false)) {
            
        $uploadError[] = 'Не удалось переместить файл ' . $file['name'];

    }
    return (empty($uploadError)) ? ['Фотографии успешно загруженны'] : $uploadError;
}

// $uploadError = null;
//     $uploadFiles = reArray($files);
//     if (countCheck($uploadFiles) === false) {
//         return ['Нельзя загружать больше 5 файлов'];
//     } 
//     foreach ($uploadFiles as $file ) {
//         $uploadError = null;
//         if (checkfileType($file) === false) {
//             $uploadError[] = 'Неверное расширение файла ' . $file['name'];
//         } elseif (checkfileSize($file) === false) {
//             $uploadError[] = 'Размер файла ' . $file['name'] . ' превышает лимит в 2мб';
//         }

//         if (empty($uploadError)) {
//             if (movedFilesInDir($file) === false) {
//                 $uploadError[] = 'Не удалось переместить файл ' . $file['name'];
//             }
//         }
//     }
    
//     return (empty($uploadError)) ? ['Фотографии успешно загруженны'] : $uploadError;