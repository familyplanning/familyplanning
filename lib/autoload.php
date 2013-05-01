<?php
    function autoload($class)
    {
        $classes = array (
  'application' => 'lib/Application.class.php',
  'applicationcomponent' => 'lib/ApplicationComponent.class.php',
  'backcontroller' => 'lib/BackController.class.php',
  'config' => 'lib/Config.class.php',
  'httprequest' => 'lib/HTTPRequest.class.php',
  'httpresponse' => 'lib/HTTPResponse.class.php',
  'manager' => 'lib/Manager.class.php',
  'managers' => 'lib/Managers.class.php',
  'events' => 'lib/models/Events.class.php',
  'eventsmanager' => 'lib/models/EventsManager.class.php',
  'eventsmanager_pdo' => 'lib/models/EventsManager_PDO.class.php',
  'cycles' => 'lib/models/Cycles.class.php',
  'cyclesmanager' => 'lib/models/CyclesManager.class.php',
  'cyclesmanager_pdo' => 'lib/models/CyclesManager_PDO.class.php',
  'users' => 'lib/models/Users.class.php',
  'usersmanager' => 'lib/models/UsersManager.class.php',
  'usersmanager_pdo' => 'lib/models/UsersManager_PDO.class.php',
  'page' => 'lib/Page.class.php',
  'pdofactory' => 'lib/PDOFactory.class.php',
  'record' => 'lib/Record.class.php',
  'router' => 'lib/Router.class.php',
  'user' => 'lib/User.class.php',
  'logs' => 'lib/Logs.class.php',
);
        
        require dirname(__FILE__).'/../'.$classes[strtolower($class)];
    }
    
    spl_autoload_register('autoload'); 