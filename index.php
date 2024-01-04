
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
                    <input type="text" class="form-control" name="url" placeholder="Введите ссылку..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" name="button" type="submit">Вперед</button>
                    </div>
                </div>
             </form>
    </div>
</body>
</html>