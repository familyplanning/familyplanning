<?php
    class EventsManager_PDO extends EventsManager
    {
    	protected function add(Events $events)
        {
            $requete = $this->dao->prepare('INSERT INTO events SET user = :user, event = :event, dateevent = str_to_date(:dateevent, \'%d/%m/%Y\')');
            
            $requete->bindValue(':user', $events->user(), PDO::PARAM_INT);
			$requete->bindValue(':event', $events->event());
			$requete->bindValue(':dateevent', $events->dateevent());
			return $requete->execute();
        }
		
		protected function modify(Events $events)
        {
            $requete = $this->dao->prepare('UPDATE events SET user = :user, event = :event, dateevent = str_to_date(:dateevent, \'%d/%m/%Y\') WHERE id = :id');
           
			$requete->bindValue(':user', $events->user(), PDO::PARAM_INT);
			$requete->bindValue(':event', $events->event());
			$requete->bindValue(':dateevent', $events->dateevent());
            $requete->bindValue(':id', $events->id(), PDO::PARAM_INT);
            
			return $requete->execute();
        }
		
		public function getList($userId)
        {
            $listeEvents = array();
            
            $sql = 'SELECT id, user, event, DATE_FORMAT (dateevent, \'%d/%m/%Y\') AS dateevent FROM events ORDER BY id DESC';
            try
			{
				$requete = $this->dao->query($sql);
			}
			catch (Exception $e)
			{
				$log = new Logs("Erreur de la base de données - getlist event: " . $e->getMessage() . ". N°: " . $e->getCode(). ".", "logadmin.txt");
				$log->writter_log();
				header ("location: dirname(__FILE__).'/../errors/error_database.html");
			}
			
            while ($events = $requete->fetch(PDO::FETCH_ASSOC))
            {
                $listeEvents[] = new Events($events);
            }
            
            $requete->closeCursor();
            
            return $listeEvents;
        }
		
	}