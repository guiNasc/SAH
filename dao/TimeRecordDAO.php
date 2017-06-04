<?php
include_once "BaseDAO.php";


class TimeRecordDAO extends BaseDAO{ 

	public function __construct() {
        $this->conexao = BaseDAO::conexao();
    }

    public function buscar($p_dtIni,$p_dtFim,$p_motive,$p_userId) {
        try { 
            $stm = $this->conexao->prepare("SELECT id,date_format(data, '%d/%m/%Y') as data, motive, time_format(time_in,'%H:%i') as timeIn, time_format(time_out,'%H:%i') as timeOut, time_format(time_out - time_in,'%H:%i') as total FROM time_record WHERE id_user = ? and data between str_to_date(?,'%d/%m/%Y') and str_to_date(?,'%d/%m/%Y') and motive = ?");

            $count = 0;
            $stm->bindValue(++$count, $p_userId);
            $stm->bindValue(++$count, $p_dtIni);
            $stm->bindValue(++$count, $p_dtFim);
            $stm->bindValue(++$count, $p_motive);

            if($stm->execute()) {
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            }

        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }

    }
    
}
?>