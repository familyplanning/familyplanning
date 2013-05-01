<?php
    class Logs
    {
		protected $message = '';
        protected $log = '';
		
		public function __construct( $message, $log )
        {
            $this->setMessage($message);
            $this->setLog($log);
        }
		
		public function setMessage($message)
        {
                $this->message = $message;
        }
		
		public function setLog($log)
        {
                $this->log = $log;
        }
		
        public function writter_log()
		{
			$format = 'd/m/y, H:i:s' ;
			$this->message = date($format) . "\t\t" . $this->message . "\r\n";
			$file = @fopen(  $this->log, "a" );
			@fwrite( $file , $this->message );
			fclose($file);
		}
    }