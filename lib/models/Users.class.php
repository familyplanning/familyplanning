<?php
    class Users extends Record
    {
        protected $id,
				  $username,
                  $mot_de_passe,
                  $regular,
				  $datepremiercycle,
                  $dureecycle,
                  $dureeregle,
                  $email;
        
        const USERNAME_INVALIDE = 1;
        const MOTDEPASSE_INVALIDE = 2;
		const REGULAR_INVALIDE = 3;
		const DATEPREMIERCYCLE_INVALIDE = 4;
        const DUREECYCLE_INVALIDE = 5;
		const DUREEREGLE_INVALIDE = 6;
        const EMAIL_INVALIDE = 7;
		
        public function isValid()
        {
            return !(empty($this->username) || empty($this->email) || empty($this->mot_de_passe));
        }
        
        
        // SETTERS //
        
        public function setUsername($username)
        {
            if (!is_string($username) || empty($username))
                $this->erreurs[] = self::TYPE_INVALIDE;
            else
                $this->username = $username;
        }
		
		public function setMot_de_passe($mot_de_passe)
        {
            if (!is_string($mot_de_passe) || empty($mot_de_passe))
				$this->erreurs[] = self::MOTDEPASSE_INVALIDE;
            else
                $this->mot_de_passe = $mot_de_passe;
        }
		
        public function setRegular($regular)
        {
                $this->regular = $regular;
        }
		
		public function setDureeregle($dureeregle)
        {
                $this->dureeregle = $dureeregle;
        }
		
		public function setDureecycle($dureecycle)
        {
                $this->dureecycle = $dureecycle;
        }
		 
        public function setEmail($email)
        {
            if (is_string($email) && preg_match('`^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$`', $email))
				$this->email = $email;
            else
                $this->erreurs[] = self::EMAIL_INVALIDE;
        }
        
        public function setDatepremiercycle($datepremiercycle)
        {
            //if (is_string($datepremiercycle) && preg_match('`[0-9]{2}/[0-9]{2}/[0-9]{4}`', $datepremiercycle))
                $this->datepremiercycle = $datepremiercycle;
        }
		
        
        // GETTERS //
         
		public function id()
        {
            return $this->id;
        }
		
        public function username()
        {
            return $this->username;
        }
		
		
		public function mot_de_passe()
        {
            return $this->mot_de_passe;
        }
		
		public function regular()
        {
            return $this->regular;
        }
		
		public function dureeregle()
        {
            return $this->dureeregle;
        }
		
		public function dureecycle()
        {
            return $this->dureecycle;
        }
		
		public function email()
        {
            return $this->email;
        }
		
		public function datepremiercycle()
        {
            return $this->datepremiercycle;
        }
    }