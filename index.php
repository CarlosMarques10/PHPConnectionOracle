<?php

class conexao {

private static $_pdoOracle;

public static function getInstanceOracle() {

    if (!isset(self::$_pdoOracle)) {
        try {
            $tnsName = '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = ...)(PORT = 1521))) (CONNECT_DATA = (SID = ...)))';
            $username = 'EBAHIANA';
            $password = '';
            
            self::$_pdoOracle = new \PDO('oci:dbname=' . $tnsName, $username, $password);
            
            // Verificar se a conexão foi estabelecida
            if (self::$_pdoOracle) {
                echo "Conexão estabelecida com sucesso!";
            } else {
                echo "Não foi possível estabelecer a conexão.";
            }
        } catch (\PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }
    return self::$_pdoOracle;
}
}

 conexao::getInstanceOracle();
