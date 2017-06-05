<?php
include_once "BaseDAO.php";


class TimeRecordDAO extends BaseDAO{ 

	public function __construct() {
        $this->conexao = BaseDAO::conexao();
    }

    public function buscar($p_dtIni,$p_dtFim,$p_motive,$p_userId) {
        try { 
            $stm = $this->conexao->prepare("SELECT id,date_format(data, '%d/%m/%Y') as data, motive, time_format(time_in,'%H:%i') as timeIn, time_format(time_out,'%H:%i') as timeOut, time_format(timediff(time_out, time_in),'%H:%i') as total FROM time_record WHERE id_user = ? and data between str_to_date(?,'%d/%m/%Y') and str_to_date(?,'%d/%m/%Y') and motive = ?");

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

    public function buscarById($p_id) {
        try { 
            $stm = $this->conexao->prepare("SELECT id,date_format(data, '%d/%m/%Y') as data, motive, time_format(time_in,'%H:%i') as timeIn, time_format(time_out,'%H:%i') as timeOut FROM time_record WHERE id = ?");

            $count = 0;
            $stm->bindValue(++$count, $p_id);
            

            if($stm->execute()) {
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            }

        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }

    }



	public function editar($p_data,$p_hrIni,$p_hrFim,$p_userId,$p_motive,$p_id) {

        try { 

            $ps = $this->conexao->prepare("UPDATE time_record set data = str_to_date(?, '%d/%m/%Y'), time_in = ?, time_out = ?, id_user = ?, motive = ? where id= ?");
            
      
            $cont = 0;
            $ps->bindValue(++$cont, $p_data);
            $ps->bindValue(++$cont, $p_hrIni);
            $ps->bindValue(++$cont, $p_hrFim);
            $ps->bindValue(++$cont, $p_userId);
            $ps->bindValue(++$cont, $p_motive);
            $ps->bindValue(++$cont, $p_id);
            
            if($ps->execute()) {
                echo "Dados atualizados com sucesso! <br/>";
            }
            
        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }
    }


    public function inserir($p_data,$p_hrIni,$p_hrFim,$p_userId,$p_motive) {

        try { 

            $ps = $this->conexao->prepare("INSERT INTO time_record(data, time_in, time_out, id_user, motive) VALUES (str_to_date(?, '%d/%m/%Y'),?,?,?,?)");
            
      
            $cont = 0;
            $ps->bindValue(++$cont, $p_data);
            $ps->bindValue(++$cont, $p_hrIni);
            $ps->bindValue(++$cont, $p_hrFim);
            $ps->bindValue(++$cont, $p_userId);
            $ps->bindValue(++$cont, $p_motive);
            
            if($ps->execute()) {
                echo "Dados inseridos com sucesso! <br/>";
            }
            
        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }
    }
    
}
?>