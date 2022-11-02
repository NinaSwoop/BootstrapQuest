<?php
$errors = [];
// Je vérifie si le formulaire est soumis comme d'habitude
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Securité en php
    // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés (attention ce dossier doit être accessible en écriture)
    $uploadDir = 'public/uploads';
    // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    // Je récupère l'extension du fichier
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    // Les extensions autorisées
    $authorizedExtensions = ['jpg', 'png', 'gif', 'webp'];
    // Le poids max géré par PHP par défaut est de 2M
    $maxFileSize = 1000000;

    // Je sécurise et effectue mes tests
    /****** Si l'extension est autorisée *************/
    if ((!in_array($extension, $authorizedExtensions)))
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Gif ou webp !';
    /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
        $errors[] = "Votre fichier doit faire moins de 1M !";
    if (!isset($_POST["firstname"]) || trim($_POST["firstname"]) == '')
        $errors[] = "Le prénom est obligatoire";
    if (!isset($_POST["lastname"]) || trim($_POST["lastname"]) === '')
        $errors[] = "Le nom est obligatoire";
    if (!isset($_POST["age"]) || trim($_POST["age"]) === '')
        $errors[] = "L'adresse mail est obligatoire'";

    if (empty($errors)) {
        $uniqueName = uniqid('', true) . '.' . $extension;
        $fileDestination = 'public/uploads/' . $uniqueName;
        move_uploaded_file($_FILES['avatar']['tmp_name'], $fileDestination);

?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <h1 class="text-center">You're welcome on SpringfieldWild</h1>

        <p> Votre demande a bien été prise en compte.</p> </br>
        <p> Prénom : <?php echo $_POST["firstname"]; ?> </p> </br>
        <p> Nom : <?php echo $_POST["lastname"]; ?> </p> </br>
        <p> Age : <?php echo $_POST["age"]; ?> </p> </br>
        <p> Votre photo : <img src=" <?php echo $fileDestination ?> " alt=""></p>
<?php
    } else if (count($errors) > 0) {
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }
}

?>