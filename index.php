<?php
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">
    <link rel="icon" href="logo.png" type="images/png" sizes="16*16">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Merge Image</title>
</head>
<body>
<section class="page">
    <form action="image-process.php" method="post" enctype="multipart/form-data" class="container mt-4" id="form">
        <section class="row justify-content-center text-center">
            <section class="col-12 col-lg-4"><img src="evan.jpg" alt="temp" class="img-fluid finaly"></section>
        </section>
        <section class="form-floating mt-4">
            <section class="d-flex justify-content-center my-3">
                <label for="photo" class="btn btn-lg btn-outline-primary" id="photo-label">انتخاب تصویر</label>
                <input name="photo" type="file" id="photo" accept="image/png, image/gif, image/jpeg" oninput="settext()">
            </section>
            <input type="submit" class="w-100 btn-lg btn btn-outline-success btn-merge" id="submit" name="submit" value="بارگذاری">
        </section>
        <section class="w-100 mt-3 text-center" id="message"></section>
        <script src="input.js"></script>
        <script src="ajax.js"></script>
    </form>
</section>
</body>
</html>
