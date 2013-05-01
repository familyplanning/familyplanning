<?php
    class UsersManager_PDO extends UsersManager
    {
    	protected function add(Users $users)
        {
            $requete = $this->dao->prepare('INSERT INTO users SET username = :username, mot_de_passe = :mot_de_passe, regular = :regular, dureecycle = :dureecycle, dureeregle = :dureeregle, email = :email, datepremiercycle = str_to_date(:datepremiercycle, \'%Y-%m-%d\')');
            
            $requete->bindValue(':username', $users->username());
			$requete->bindValue(':mot_de_passe', $users->mot_de_passe());
			$requete->bindValue(':regular', $users->regular());
			$requete->bindValue(':dureecycle', $users->dureecycle(), PDO::PARAM_INT);
			$requete->bindValue(':dureeregle', $users->dureeregle(), PDO::PARAM_INT);
			$requete->bindValue(':email', $users->email());
			$requete->bindValue(':datepremiercycle', $users->datepremiercycle());
			return $requete->execute();
        }
		
		protected function modify(Users $users)
        {
            $requete = $this->dao->prepare('UPDATE users SET username = :username, mot_de_passe = :mot_de_passe, regular = :regular, dureecycle = :dureecycle, dureeregle = :dureeregle, email = :email, datepremiercycle = str_to_date(:datepremiercycle, \'%Y-%m-%d\') WHERE id = :id');
           
            $requete->bindValue(':username', $users->username());
			$requete->bindValue(':mot_de_passe', $users->mot_de_passe());
			$requete->bindValue(':regular', $users->regular());
			$requete->bindValue(':dureecycle', $users->dureecycle(), PDO::PARAM_INT);
			$requete->bindValue(':dureeregle', $users->dureeregle(), PDO::PARAM_INT);
			$requete->bindValue(':email', $users->email());
			$requete->bindValue(':datepremiercycle', $users->datepremiercycle());
            $requete->bindValue(':id', $users->id(), PDO::PARAM_INT);
            
			return $requete->execute();
        }
		
		public function getUnique($id)
        {
            $requete = $this->dao->prepare('SELECT id, username, regular, dureecycle, dureeregle, mot_de_passe, email, DATE_FORMAT (datepremiercycle, \'%Y-%m-%d %H:%i:%s\') AS datepremiercycle FROM users WHERE id = :id');
            $requete->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $requete->execute();
			
            if ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                return new Users($donnees);
            }
            
            return null;
        }
		
		public function getUniquee($id)
        {
            $requete = $this->dao->prepare('SELECT id, username, regular, dureecycle, dureeregle, mot_de_passe, email, DATE_FORMAT (datepremiercycle, \'%d/%m/%Y\') AS datepremiercycle FROM users WHERE id = :id');
            $requete->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $requete->execute();
			
            if ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                return new Users($donnees);
            }
            
            return null;
        }
		
		public function getUniqueauth($username)
        {
            $requete = $this->dao->prepare('SELECT id, username, regular, dureecycle, dureeregle, mot_de_passe, email, DATE_FORMAT (datepremiercycle, \'on %d/%m/%Y\') AS datepremiercycle FROM users WHERE username = :username');
            $requete->bindValue(':username', $username, PDO::PARAM_STR);
            $requete->execute();
			
            
            if ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                return new Users($donnees);
            }
            
            return null;
        }
		
	}