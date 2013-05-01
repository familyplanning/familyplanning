<?php
    class UsersController extends BackController
    {
		public function executeHome(HTTPRequest $request)
        {
            $this->page->addVar('title', 'FamilyPlanning - Home');
        }
		
        public function executeAuthentification(HTTPRequest $request)
        {
            $this->page->addVar('title', 'Connexion');
            if ($request->postExists('username'))
            {
                $username = $request->postData('username');
                $mot_de_passe = $request->postData('mot_de_passe');
				$users = $this->managers->getManagerOf('users')->getUniqueauth($username);
    			if ($users['mot_de_passe'] == $mot_de_passe)
				{	
					$this->app->user()->setAttribute('id', $users['id']);
					$this->app->user()->setAttribute('username', $users['username']);
					$this->app->user()->setAttribute('regular', $users['regular']);
					$this->app->user()->setAttribute('dureecycle', $users['dureecycle']);
					$this->app->user()->setAttribute('dureeregle', $users['dureeregle']);
					$this->app->user()->setAttribute('mot_de_passe', $users['mot_de_passe']);
					$this->app->user()->setAttribute('email', $users['email']);
					$this->app->user()->setAttribute('datepremiercycle', $users['datepremiercycle']);
					$this->app->user()->setAuthenticated(true);
					$type = $this->app->user()->getAttribute('type');
					$log = new Logs($this->app->user()->getAttribute('username') . " s'est connecté au système.", "log.txt");
					$log->writter_log();
					
					$this->app->httpResponse()->redirect('calendrier.html');
   				}
				else
				{
					$this->app->user()->setFlash('Votre mot de passe et\ou login est incorrect.');
					$log = new Logs("Une tentative de connexion au système avec le login " . $username . " a échoué pour cause de mot de passe et\ou login incorrect.", "logadmin.txt");
					$log->writter_log();
				}
            }
        }
		
		public function executeDeconnexion(HTTPRequest $request)
        {
			$log = new Logs($this->app->user()->getAttribute('username') . " s'est déconnecté au système.", "log.txt");
			$log->writter_log();
            session_unset ();
			session_destroy ();
			$this->app->user()->setFlash('Vous vous êtes bien déconnecté(e).');
			$this->app->httpResponse()->redirect('index.html');
        }

		public function executeInsert(HTTPRequest $request)
        {
            if ($request->postExists('username'))
            {
                $this->processForm($request);
            }
            
            $this->page->addVar('title', 'Ajout d\'un utilisateur');
			$this->page->addVar('css1', 'mail_user.css');
			$this->page->addVar('css2', 'main.css');
			$page = $request->getData('page');
			$this->page->addVar('page', $page);
        }
        
        public function processForm(HTTPRequest $request)
        {
			if ($request->postData('mot_de_passe') == $request->postData('mot_de_passe_prim'))
            {
				$postpassword = $request->postData('mot_de_passe');
            }
			else
			{
				$postpassword = '';
            }
			
            $users = new Users(
                array(
					'username' => $request->postData('username'),
                  	'regular' => $request->postData('regular'),
                  	'dureecycle' => $request->postData('dureecycle'),
                  	'dureeregle' => $request->postData('dureeregle'),
					'datepremiercycle' => $request->postData('datepremiercycle'),
					'mot_de_passe' => $postpassword,
					'email' => strtolower($request->postData('email'))
                )
            );
			if ($request->postExists('id'))
            {
                $users->setId($request->postData('id'));
            }
            if ($users->isValid())
            {
				try
				{
					$this->managers->getManagerOf('users')->save($users);
				}
				catch (Exception $e)
				{
					$log = new Logs("Erreur de la base de données - save / modify user: " . $e->getMessage() . ". N°: " . $e->getCode(). ".", "logadmin.txt");
					$log->writter_log();
					$this->app->httpResponse()->redirecterror('error_database');
				}
                $this->app->user()->setFlash($users->isNew() ? 'L\'utilisateur a bien été ajouté !' : 'L\'utilisateur a bien été modifié !');
				$log = new Logs($users->isNew() ? $this->app->user()->getAttribute('username') . " a été ajouté." : $this->app->user()->getAttribute('username') . " a été modifié.", "log.txt");
				$log->writter_log();
				$page = $request->getData('page');
				$this->page->addVar('page', $page);
				$users->isNew() ? $this->app->httpResponse()->redirect('index.html') : $this->app->httpResponse()->redirect('calendrier.html');
            }
            else
            {
                $this->page->addVar('erreurs', $users->erreurs());	
            }
            
            $this->page->addVar('users', $users);
        }

		public function executeUpdate(HTTPRequest $request)
        {
            if ($request->postExists('username'))
            {
                $this->processForm($request);
            }
            else
            {
                $utilisateur_modify = $this->managers->getManagerOf('users')->getUniquee($request->getData('id'));
				if (is_object($utilisateur_modify))
				{
					if ($utilisateur_modify->isValid())
					{
						$this->page->addVar('users', $utilisateur_modify);
					}
				}
				else
				{
					$log = new Logs("Erreur de la base de données - get unique: Mauvais paramètre.", "logadmin.txt");
					$log->writter_log();
					$this->app->httpResponse()->redirecterror('error_database');
				}
            }
            
            $this->page->addVar('title', 'Modification d\'un utilisateur');
			$this->page->addVar('css1', 'mail_user.css');
			$this->page->addVar('css2', 'main.css');
			$page = $request->getData('page');
			$this->page->addVar('page', $page);
        }
		
		public function executeCalendrier(HTTPRequest $request)
		{
            $this->page->addVar('title', 'Page personnelle');
			
			$users = $this->managers->getManagerOf('users')->getUnique($this->app->user()->getAttribute('id'));
			$cycles = $this->managers->getManagerOf('cycles')->getList($this->app->user()->getAttribute('id'));
			$events = $this->managers->getManagerOf('events')->getList($this->app->user()->getAttribute('id'));
			
			$datedebutregle1 = new DateTime($users->datepremiercycle());
			$datesregle1 = array();
			$datesregle1[$datedebutregle1->format('m-d-Y')] = "<a href='#'> Règles</a>";
			for ( $i = 1; $i < $users->dureeregle(); $i++)
			{
				$datedebutregle1 = date_add($datedebutregle1, new DateInterval("P1D"));
				$datesregle1[$datedebutregle1->format('m-d-Y')] = "<a href='#'> Règles</a>";
			}
			
			$datedebutregle2 = date_add(new DateTime($users->datepremiercycle()), new DateInterval("P". $users->dureecycle() ."D"));
			$datefinale = $datedebutregle2;
			$datesregle1[$datedebutregle2->format('m-d-Y')] = "<a href='#'> Règles</a>";
			for ( $i = 1; $i < $users->dureeregle(); $i++)
			{
				$datedebutregle2 = date_add($datedebutregle2, new DateInterval("P1D"));
				$datesregle1[$datedebutregle2->format('m-d-Y')] = "<a href='#'> Règles</a>";
			}
			
			
			
			$datefinale = date_add(new DateTime($users->datepremiercycle()), new DateInterval("P". $users->dureecycle() ."D"));
			$datedebutfertilite = date_sub($datefinale, new DateInterval("P17D"));
			$datesfertile1 = array();
			$datesfertile1[$datedebutfertilite->format('m-d-Y')] = "<a href='#'> Fertilité</a>";
			for ( $i = 1; $i < 6; $i++)
			{
				$datedebutfertilite = date_add($datedebutfertilite, new DateInterval("P1D"));
				$datesfertile1[$datedebutfertilite->format('m-d-Y')] = "<a href='#'> Fertilité</a>";
			}
			$data = array();
			$data = array_merge($datesregle1, $datesfertile1);
			
		
			$datajson = json_encode($data);
			$this->page->addVar('dataevent', $datajson);
			
			
			
		}
	}
	