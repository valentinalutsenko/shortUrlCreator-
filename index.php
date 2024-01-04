<?php
    session_start();
    // require_once __DIR__  . '/shorten.php';
    // require_once __DIR__  .'/redirect.php';


    function debug($data) {
        echo '<pre>'. print_r($data, 1) . '</pre>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <title>Short URL Creator</title>
</head>
<body>
    <div class="container text-center" >
        <div class="row" style="margin-top: 20%; margin-left:35%;">
            <h1 >Short URL Creator</h1>
        </div> 
      
            <form  method="POST">
                <div class="input-group mb-3">
                    <input type="url" class="form-control" name="url" placeholder="Введите ссылку..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" name="btn" type="submit">Вперед</button>
                    </div>
                </div>
             </form>

             <?php
            
                if(isset($_SESSION['feedback'])) {
                    echo "<p>". $_SESSION['feedback'] ."</p>";
                    unset($_SESSION['feedback']);
                }

             ?>
    </div>
</body>
</html>