<?php
include_once "BaseDAO.php";
include_once "../model/Usuario.php";


class LoginDAO extends BaseDAO{ 

	public function __construct() {
        $this->conexao = BaseDAO::conexao();
    }

    public function buscar($p_mail,$p_pass) {
        try { 
            $stm = $this->conexao->prepare("SELECT * FROM users WHERE mail = ? and pass = ?");

            $count = 0;
            $stm->bindValue(++$count, $p_mail);
            $stm->bindValue(++$count, $p_pass);

            if($stm->execute()) {
                $user = new Usuario();
                $user = $stm->fetchObject("Usuario"); 
                return $user;
            }

        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }

    }
    
}

?>