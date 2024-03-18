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
        if (preg_match('/^[a-zA-Z0-9]{4,16}$/', $username)) {
            echo "<p>Mon nom : $username</p> <br>";
        } else {
            echo "<alert>Merci de respecter le format chiffre lettre majuscule minuscule</alert> <br>";
        }
        $email = $_POST['email'];
        if ($email) {
            $emailSanitize = filter_var($email, FILTER_SANITIZE_EMAIL);
            echo "<p>Mon email : $emailSanitize</p> <br>";
        } else {
            echo "<alert>Merci de respecter le format email</alert> <br>";
        }
        $password = $_POST['password'];
                     // /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,20}$/
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%*?&]{8,20}$/', $password)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            echo "<p>Mon mot de passe : $password</p> <br>";
        } else {
            echo "<alert>Le mot de passe ne conviens pas</alert> <br>";
        }
        $sql = "INSERT INTO utilisateur (username, email, password, role_idrole) VALUES (:username, :email, :password, :role_idrole)";
        require "db.php";
        $role = 2;
        $envoie = $pdo->prepare($sql);
        $enovie->bindParam(':username', $username);
        $envoie->bindParam(':email', $email);
        $envoie->bindParam(':password', $passwordHash);
        $envoie->bindParam(':role_idrole', $role);

        $envoie->execute();
        echo "Tout est ok";
        
    } else {
        echo "<p>Merci de remplir tout les champs du formulaire.</p>";
    }
} else {
    echo "<p>Merci de remplir le formulaire.</p>";
}
include "common/footer.php" ?> 