<?php
    abstract class EventsManager extends Manager
    {
    	/**
         * Méthode permettant d'ajouter une news
         * @param $news News La news à ajouter
         * @return void
         */
        abstract protected function add(Events $events);
		
		 /**
         * Méthode permettant de modifier une news
         * @param $news news la news à modifier
         * @return void
         */
        abstract protected function modify(Events $events);
		
        /**
         * Méthode permettant d'enregistrer une news
         * @param $news News la news à enregistrer
         * @see self::add()
         * @see self::modify()
         * @return void
         */
        public function save(Events $events)
        {
            if ($users->isValid())
            {
                $users->isNew() ? $this->add($events) : $this->modify($events);
            }
            else
            {
                throw new RuntimeException('L\'evènement doit être valide pour être enregistré');
            }
        }
		
	    /**
         * Méthode retournant une liste de news demandée
         * @param $debut int La première news à sélectionner
         * @param $limite int Le nombre de news à sélectionner
         * @return array La liste des news. Chaque entrée est une instance de News.
         */
        abstract public function getList($userId);
		
    }

