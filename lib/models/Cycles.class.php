<?php
    class Cycles extends Record
    {
        protected $id,
				  $user,
				  $datecycle;
        
        const USER_INVALIDE = 1;
		const DATECYCLE_INVALIDE = 2;
		
        public function isValid()
        {
            return !(empty($this->user) || empty($this->datecycle));
        }
        
        
        // SETTERS //
        
        public function setUser($user)
        {
                $this->user = $user;
        }
        
        public function setDatecycle($datecycle)
        {
            if (is_string($datecycle) && preg_match('`[0-9]{2}/[0-9]{2}/[0-9]{4}`', $datecycle))
                $this->datecycle = $datecycle;
        }
		
        
        // GETTERS //
         
		public function id()
        {
            return $this->id;
        }
		
        public function user()
        {
            return $this->user;
        }
		
		public function datecycle()
        {
            return $this->datecycle;
        }
    }