<?php
    abstract class Application
    {
    	protected $config;
		protected $httpRequest;
		protected $httpResponse;
		protected $name;
		protected $user;
		
		public function __construct ()
		{
			$this->config = new Config ($this);
			$this->httpRequest = new HTTPRequest ($this);
			$this->httpResponse = new HTTPResponse ($this);
			$this->user = new User ($this);
			$this->name = '';
		}
		abstract public function run ();
		
		public function config()
		{
			return $this->config;
		}
		
		public function httpRequest()
		{
			return $this->httpRequest;
		}
		
		public function httpResponse()
		{
			return $this->httpResponse;
		}
		
		public function name()
		{
			return $this->name;
		}
		public function user()
		{
			return $this->user;
		}
	}