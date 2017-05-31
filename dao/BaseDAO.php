<?php

class BaseDAO {

    public $tipo = "mysql";
    public $host = "localhost";
    public $usuario = "root";
    public $senha = "root";
    public $banco = "sah";

    public $con = null;
    public function conexao() {

        try {
            $this->con = new PDO($this->tipo.":host=".$this->host.";dbname=".$this->banco, 
                                 $this->usuario,
                                 $this->senha);
            
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $this->con; 
            
        } catch(PDOException $e) {
            echo "Erro: ".$e->getMessage();
            echo $con->erroInfo();
        }

    }

}

?>