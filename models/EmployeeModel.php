<?php

class EmployeeModel {
    public static function authenticateEmployee($email, $password) {
        $db = Database::connect();

        $sql = "SELECT * FROM employees WHERE adm_mail = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['emp_password'])) {
            return true;
        }

        return false;
    }
}