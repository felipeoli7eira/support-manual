<?php

namespace App\Classes;

use PDO;
use PDOException;

/**
 * Classe responsável por conectar e manipular o banco de dados
 *
 * @package     app
 * @subpackage  Classes
 * @name        Connection
 * @author      Ryan Maia
 *
 */
class Database
{
    /**
     * Método responsável por retornar a view renderizada com as variáveis
     * @param string $host Host do banco de dados
     * @param string $port Porta do banco de dados
     * @param string $user Usuário do banco de dados
     * @param string $password Senha do banco de dados
     * @param string $database Nome do banco de dados
     * @return object
     */
    public static function connect(string $host,int $port, string $user,string $password,string $database): ?object
    {
        $dns = "mysql:host={$host};port={$port};dbname={$database}";
        try
        {
            return new PDO($dns, $user,$password);
        }
        catch(PDOException $e)
        {
            echo '<pre>';print_r($e->getMessage());echo'</pre>';exit;
        }
    }
}