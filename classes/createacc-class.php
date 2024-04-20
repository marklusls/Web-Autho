<?php
class CreateAcc {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function createUser($email, $name, $password, $address, $dob, $tele) {
        $result = $this->database->query("SELECT * FROM webuser WHERE email='$email';");
        if ($result->num_rows == 1) {
            return "User with this email already exists.";
        } else {
            $this->database->query("INSERT INTO patient(pemail, pname, ppassword, paddress, pdob, ptel) VALUES ('$email', '$name', '$password', '$address', '$dob', '$tele');");
            $this->database->query("INSERT INTO webuser VALUES ('$email','p')");

            return true;
        }
    }
}
?>