<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>SpringfieldWild</title>
</head>

<body>

    <h1 class="text-center">SpringfieldWild</h1>

    <form action="thanks.php" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-center form-floating my-5">
            <div class="col-sm-4">
                <div class="mb-3 mt-3 form-label">
                    <label for="firstname">Firstname :</label>
                    <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Your firstname here">
                </div>

                <div class="mb-3 form-label">
                    <label for="lastname">Lastname :</label>
                    <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Your name here">
                </div>
                <div class="mb-3 form-label">
                    <label for="age">Age :</label>
                    <input class="form-control" type="text" id="age" name="age" placeholder="Your age here">
                </div>
                <div class="mb-3 form-label">
                    <label for="imageUpload">Upload an profile image</label>
                    <input class="form-control" type="file" name="avatar" id="imageUpload" />
                </div>
                <div class="mb-3 text-center">
                    <button name="send">Send</button>
                </div>
    </form>
</body>

</html>