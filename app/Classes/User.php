<?php

namespace App\Classes;

use App\Classes\Database;
use PDO;
use PDOException;

/**
 * Classe responsável por gerenciar criação de postagens
 *
 * @package     app
 * @subpackage  Classes
 * @name        User
 * @author      Ryan Maia
 *
 */
class User
{
    public static function login(string $email, string $password): bool
    {
        $con = Database::connect();

        $sql = "SELECT `id`,`access`,`password` FROM users WHERE email = :email";

        $statement = $con->prepare($sql);

        $result = $statement->execute([
            ":email"      => $email
        ]);

        if ($result) {
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['user'] = ["id" => $data['id'], "access" => $data['access']];
                    return true;
                }
            } else {
                return false;
            }
        }
        return false;
    }
}
