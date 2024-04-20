<?php
class Signup {
    public function __construct() {
        session_start();
    }

    public function setPersonalInformation($fname, $lname, $address, $dob) {
        $_SESSION["personal"] = array(
            'fname' => $fname,
            'lname' => $lname,
            'address' => $address,
            'dob' => $dob
        );
    }

    public function getPersonalInformation() {
        return $_SESSION["personal"] ?? [];
    }

    public function clearSession() {
        $_SESSION = [];
        session_destroy();
    }
}
?>
