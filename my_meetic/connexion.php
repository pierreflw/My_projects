<?php
 include('db.php');
class connection extends db
{
    private $email;
    private $password;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function connect()
    {
        if (isset($_POST['login'])) {
            $this->email = $_POST['mail2'];
            $this->password = $_POST['password2'];
            $request = "SELECT * FROM info_user WHERE email ='" . $this->email . "' AND password = '" . hash('sha512', $this->password) . "'";
            $sql = $this->bdd->prepare($request);
            $sql->execute();
            $row = $sql->fetch();
            if ($sql->rowCount() > 0) {
                session_start();
                $_SESSION["ID"] = $row["id"];
                $_SESSION["mail2"] = $row["email"];
                $_SESSION["infoUser"] = $row;
                header("location: profil.php");
            } else {
                header("location: index.php");
            }
        }
    }
}
$log = new connection();
$log->connect();
