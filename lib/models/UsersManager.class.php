<?php
    abstract class UsersManager extends Manager
    {
    	/**
         * Méthode permettant d'ajouter une news
         * @param $news News La news à ajouter
         * @return void
         */
        abstract protected function add(Users $users);
		
		 /**
         * Méthode permettant de modifier une news
         * @param $news news la news à modifier
         * @return void
         */
        abstract protected function modify(Users $users);
		
        /**
         * Méthode permettant d'enregistrer une news
         * @param $news News la news à enregistrer
         * @see self::add()
         * @see self::modify()
         * @return void
         */
        public function save(Users $users)
        {
            if ($users->isValid())
            {
                $users->isNew() ? $this->add($users) : $this->modify($users);
            }
            else
            {
                throw new RuntimeException('L\'utilisateur doit être valide pour être enregistré');
            }
        }
		
		        /**
         * Méthode retournant une news précise
         * @param $id int L'identifiant de la news à récupérer
         * @return News La news demandée
         */
        abstract public function getUnique($id);
		
		
        /**
         * Méthode renvoyant le nombre de news total
         * @return int
         */
		abstract public function getUniqueauth($login);
		
    }

