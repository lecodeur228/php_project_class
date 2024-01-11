<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    
    <form action="../controllers/register_controller.php" method="post" enctype="multipart/form-data">

            <div class=" card m-4 p-4 align-item-center">
            <?php 
                if (isset($_GET['error']) && $_GET['error'] == 5) {
                    echo "<p class='alert alert-danger'>les champs ne sont pas remplie</p>";
                }
            ?>
                <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom :</label>
            <input type="text" class="form-control"  name="nom">
            <?php 
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo "<p class='text text-danger'>Le nom est obligatoire</p>";
                }
            ?>
            </div>
                <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prenom : </label>
            <input type="text" class="form-control"  name="prenom">
            <?php 
                if (isset($_GET['error']) && $_GET['error'] == 2) {
                    echo "<p class='text text-danger'>Le prenom est obligatoire</p>";
                }
            ?>
            </div>
                <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">mot de passe :</label>
            <input type="text" class="form-control"  name="mdp"> <?php 
                if (isset($_GET['error']) && $_GET['error'] == 3) {
                    echo "<p class='text text-danger'>Le mot de passe est obligatoire</p>";
                }
            ?>
            </div>
                <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Photo de profile : </label>
            <input type="file" class="form-control"  name="image">
            <?php 
                if (isset($_GET['error']) && $_GET['error'] == 4) {
                    echo "<p class='text text-danger'>La photo de profile est obligatoire</p>";
                }
            ?>
            </div>
            <button type="submit" class="btn btn-primary">Creer un compte </button>
            
            </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>