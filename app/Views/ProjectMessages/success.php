<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|| Success ||</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    
    <div class="container text-center">
        <h1 class="bi bi-check2-circle m-3 text-success" style="font-size: 4rem;">
        <?= $title ?>
        </h1>
        <p> Redirecting you to Home Page in ... <span id='timer'></span>
    </div>




    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 2;
        let timer = document.getElementById('timer');
        setInterval(() =>
        {
            timer.innerHTML = i;
            i--;
            if(i === 0)
            {
                window.location.href = <?= $redirect ?>;
            }
        }, 700)
    </script>
</body>
</html>