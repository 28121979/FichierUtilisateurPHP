<?php include 'common\head.php'; ?>
<?php include 'common\menu.php'; ?>

<div class="cnotainer-fluid">
    <h1>Inscription</h1>
    <div class="row">
        <div class="col-6 m-auto ">
            <form method="post">
                <div class=" mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    </div>
                <div class="mb-3 text-center " >
                    <input  type="submit" class="btn btn-primary" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        if (!preg_match("",$username)) {
            echo "Mon nom : $username;"
        }else{
            
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo "Mon nom : $username , mon email : $email , mon mot de passe : $password";

    }else{
        echo "Merci de remplor tous les champs de formulaire !";
    }


}
?>