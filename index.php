<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploader</title>
    <link rel="stylesheet" href="../Template/assets/css/style.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION["message"]) && $_SESSION["message"]): ?>
            <p class="msg"><?= $_SESSION["message"] ?></p>

        <?php
            unset($_SESSION["message"]);
        endif
        ?>
        <form action="./upload.php" method="post" enctype="multipart/form-data">
            <div class="upload-wrapper">

                <span class="file-name">
                    Choose a File
                </span>

                <label for="file-upload"><input type="file" name="uploadedFile" id="file-upload"></label>
            </div>
            <input type="submit" name="uploadBtn" value="Upload File">
        </form>
    </div>

    <script>
        document.getElementById('file-upload').addEventListener('change', function() {
            let fileName = this.files[0].name;
            document.querySelector('.file-name').textContent = fileName;
        })
    </script>
</body>

</html>
