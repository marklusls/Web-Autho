<?php

require_once('database-class.php');

class User {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

}

class Admin extends User {
    public function login($email, $password) {
        $result = $this->db->query("SELECT * FROM admin WHERE aemail='$email' AND apassword='$password'");
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}

class Doctor extends User {
    public function login($email, $password) {
        $result = $this->db->query("SELECT * FROM doctor WHERE docemail='$email' AND docpassword='$password'");
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}

class Patient extends User {
    public function login($email, $password) {
        $result = $this->db->query("SELECT * FROM patient WHERE pemail='$email' AND ppassword='$password'");
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}
?>
