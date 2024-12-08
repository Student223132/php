<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка файла на сервер</title>
</head>
<body>
    <div>
        <pre>
            <?php
            /*
            ЗАДАНИЕ
            - Проверьте, отправлялся ли файл на сервер
            - В случае, если файл был отправлен, выведите: имя файла, размер, имя временного файла, тип, код ошибки
            - Для проверки типа файла используйте функцию mime_content_type() из модуля Fileinfo
            - Если загружен файл типа "image/jpeg", то с помощью функции move_uploaded_file() переместите его в каталог upload. В качестве имени файла используйте его MD5-хеш.
            */

            if (isset($_FILES['fupload']) && $_FILES['fupload']['error'] == UPLOAD_ERR_OK) {
                $file = $_FILES['fupload'];
        
                echo "Имя файла: " . $file['name'] . "\n";
                echo "Размер файла: " . $file['size'] . " байт\n";
                echo "Временное имя файла: " . $file['tmp_name'] . "\n";
                echo "Тип файла: " . mime_content_type($file['tmp_name']) . "\n";
                echo "Код ошибки: " . $file['error'] . "\n";
    
                if (mime_content_type($file['tmp_name']) == "image/jpeg") {
                    $upload_dir = "upload/";
                    $file_hash = md5_file($file['tmp_name']);
                    $new_filename = $file_hash . ".jpg";
                    $upload_file = $upload_dir . $new_filename;

                    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
                        echo "Файл успешно загружен: " . $new_filename;
                    } 
                    else {
                        echo "Ошибка при загрузке файла.";
                    }
                } 
                else {
                    echo "Загружен файл не типа JPEG.";
                }
            }
            ?>
        </pre>
    </div>
    <form enctype="multipart/form-data"
          action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
            <input type="file" name="fupload"><br>
            <button type="submit">Загрузить</button>
        </p>
    </form>
</body>
</html>