<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?= $pagetitle ?></title>
</head>
<body>

    <?php include_once 'parts/navbar.tpl.php'; ?> 
           
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <?php 
                require_once $content; 
                ?> 
       
            </div>
        </div>
    </div>
</body>
</html>