<?php

function upload()
{
    $message = "";

    $fileName = $_FILES['myFile']['name'];
    $fileType = $_FILES['myFile']['type'];
    $fileSize = $_FILES['myFile']['size'];
    $fileTmpName = $_FILES['myFile']['tmp_name'];
    $bigImgPath = IMAGES_DIR_GALLERY_BIG . $fileName;

    if (!checkFileType($fileType)) {
        $message = "typeError";
    } elseif (!checkMaxSize($fileSize)) {
        $message = "sizeError";
    } elseif (move_uploaded_file($fileTmpName, $bigImgPath)) {
        create_thumbnail($bigImgPath, IMAGES_DIR_GALLERY_THUMBNAILS . $fileName, THUMBNAILS_WIDTH, THUMBNAILS_HEIGHT);

        executeSql("INSERT INTO `gallery`(`address`, `size`, `name`) VALUES ('/img/gallery/thumbnails/$fileName','$fileSize','$fileName')");

        $message = "ok";
    } else {
        $message = "error";
    }

    header("Location: gallery/?message=" . $message);

    die();
}

function checkMaxSize($fileSize)
{
    if ($fileSize > MAX_IMAGE_SIZE) {
        return false;
    }

    return true;
}

function checkFileType($fileType)
{
    $allowedTypes = [
        'image/gif',
        'image/jpeg',
        'image/png',
        'image/webp',
    ];

    foreach ($allowedTypes as $item) {
        if ($item === $fileType) {
            return true;
        }
    }

    return false;
}

function create_thumbnail($path, $save, $width, $height)
{
    $info = getimagesize($path); //получаем размеры картинки и ее тип
    $size = array($info[0], $info[1]); //закидываем размеры в массив

    //В зависимости от расширения картинки вызываем соответствующую функцию
    if ($info['mime'] == 'image/png') {
        $src = imagecreatefrompng($path); //создаём новое изображение из файла
    } else if ($info['mime'] == 'image/jpeg') {
        $src = imagecreatefromjpeg($path);
    } else if ($info['mime'] == 'image/gif') {
        $src = imagecreatefromgif($path);
    } else {
        return false;
    }

    $thumb = imagecreatetruecolor($width, $height); //возвращает идентификатор изображения, представляющий черное изображение заданного размера
    $src_aspect = $size[0] / $size[1]; //отношение ширины к высоте исходника
    $thumb_aspect = $width / $height; //отношение ширины к высоте аватарки

    if ($src_aspect < $thumb_aspect) {
        //узкий вариант (фиксированная ширина)
        $scale = $width / $size[0];
        $new_size = array($width, $width / $src_aspect);
        $src_pos = array(0, ($size[1] * $scale - $height) / $scale / 2); //Ищем расстояние по высоте от края картинки до начала картины после обрезки
    } else if ($src_aspect > $thumb_aspect) {
        //широкий вариант (фиксированная высота)
        $scale = $height / $size[1];
        $new_size = array($height * $src_aspect, $height);
        $src_pos = array(($size[0] * $scale - $width) / $scale / 2, 0); //Ищем расстояние по ширине от края картинки до начала картины после обрезки
    } else {
        //другое
        $new_size = array($width, $height);
        $src_pos = array(0, 0);
    }

    $new_size[0] = max($new_size[0], 1);
    $new_size[1] = max($new_size[1], 1);

    imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
    //Копирование и изменение размера изображения с ресемплированием

    if ($save === false) {
        return imagepng($thumb); //Выводит JPEG/PNG/GIF изображение
    } else {
        return imagepng($thumb, $save); //Сохраняет JPEG/PNG/GIF изображение
    }
}


function getThumbnails()
{
    return getAssocResult("SELECT * FROM `gallery`");
}

function getImage(int $id)
{
    return getOneResult("SELECT * FROM `gallery` WHERE `id` = $id");
}

function getSortThumbnails()
{
    return getAssocResult("SELECT * FROM `gallery` ORDER BY `likes` DESC");
}

function addLikes(int $id)
{
    executeSql("UPDATE `gallery` SET `likes` = likes + 1 WHERE `id` = $id");

    header("Location: /gallery");

    die();
}

function deleteImg(int $id)
{
    executeSql("DELETE FROM `gallery` WHERE `id` = $id");

    header("Location: /gallery");

    die();
}

function doOneImageAction($action, $params, $id)
{
    switch ($action) {
        case 'delete':
            deleteImg($id);
            $params['message'] = "Изображение удалено";
            break;

        case 'addLike':
            addLikes($id);
            break;

            // default:
            //     $params['message'] = "Нет такого действия";
    }

    return $params;
}
