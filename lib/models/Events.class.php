<?php
    class Events extends Record
    {
        protected $id,
				  $user,
				  $event,
				  $dateevent;
        
        const USER_INVALIDE = 1;
		const DATEEVENT_INVALIDE = 2;
		const EVENT_INVALIDE = 3;
		
        public function isValid()
        {
            return !(empty($this->user) || empty($this->dateevent) || empty($this->event));
        }
        
        
        // SETTERS //
        public function setUser($user)
        {
                $this->user = $user;
        }
		
        public function setEvent($event)
        {
            if (!is_string($event) || empty($event))
                $this->erreurs[] = self::EVENT_INVALIDE;
            else
                $this->event = $event;
        }
        
        public function setDateevent($dateevent)
        {
            if (is_string($dateevent) && preg_match('`[0-9]{2}/[0-9]{2}/[0-9]{4}`', $dateevent))
                $this->dateevent = $dateevent;
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
		
		public function event()
        {
            return $this->event;
        }
		
		public function dateevent()
        {
            return $this->dateevent;
        }
    }