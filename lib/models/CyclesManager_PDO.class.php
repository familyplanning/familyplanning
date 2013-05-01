<?php
    class CyclesManager_PDO extends CyclesManager
    {
    	protected function add(Cycles $cycles)
        {
            $requete = $this->dao->prepare('INSERT INTO datedebut SET user = :user, datedebut = str_to_date(:datedebut, \'%d/%m/%Y\')');
            
            $requete->bindValue(':user', $cycles->user(), PDO::PARAM_INT);
			$requete->bindValue(':datedebut', $cycles->datedebut());
			return $requete->execute();
        }
		
		protected function modify(Cycles $cycles)
        {
            $requete = $this->dao->prepare('UPDATE datedebut SET user = :user, datedebut = str_to_date(:datedebut, \'%d/%m/%Y\') WHERE id = :id');
           
			$requete->bindValue(':user', $cycles->user(), PDO::PARAM_INT);
			$requete->bindValue(':datedebut', $cycles->datedebut());
            $requete->bindValue(':id', $cycles->id(), PDO::PARAM_INT);
            
			return $requete->execute();
        }
		
		public function getList($userId)
        {
            $listeCycles = array();
            
            $sql = 'SELECT id, user, DATE_FORMAT (datedebut, \'%d/%m/%Y\') AS datedebut FROM datedebut ORDER BY id DESC';
            
            try
			{
				$requete = $this->dao->query($sql);
			}
			catch (Exception $e)
			{
				$log = new Logs("Erreur de la base de données - getlist cycle: " . $e->getMessage() . ". N°: " . $e->getCode(). ".", "logadmin.txt");
				$log->writter_log();
				header ("location: dirname(__FILE__).'/../errors/error_database.html");
			}
			
            while ($cycles = $requete->fetch(PDO::FETCH_ASSOC))
            {
                $listeCycles[] = new Cycles($cycles);
            }
            
            $requete->closeCursor();
            
            return $listeCycles;
        }
		
	}