<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project | Delete</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid mt-5">
        <form method="POST" action="">
            <div class="text-center">
                <span style="font-size: 2rem;">Sure to <u>delete</u> the whole project ?</span>
                <p class="text-dark my-3" style="font-size: 1.5rem;">
                    <b>Project Name: </b>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    <u><?= $projectName ?></u>
                    <br>
                    <b>Project Description: </b>&nbsp; &nbsp;&nbsp; &nbsp;
                    <u><?= $projectDesc ?></u>
                </p>
                <a href="<?= PROJECTS ?>" class="btn btn-light m-3">Nah! Leave...</a>
                <input type="submit" class="btn btn-danger m-3" name="delete" id="delete" value="Yes, Delete!"></input>
                <br><br><br>
                <i class="bi bi-trash-fill" style=" display: block; font-size: 10rem"></i>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
</body>
</html>