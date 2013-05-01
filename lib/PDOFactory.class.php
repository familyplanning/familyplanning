<?php
    class PDOFactory
    {
        public static function getMysqlConnexion()
        {
			try
			{
				$db = new PDO('mysql:host=localhost;dbname=borgoual_familyplanning', 'borgoual', 'qt5q6vEJ87');
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $db;
			}
			catch (Exception $e)
			{
				$log = new Logs("Erreur de connexion à la base de données: " . $e->getMessage() . ". N°: " . $e->getCode(). ".", "logadmin.txt");
				$log->writter_log();
				header ("location: error_database.html");
			}
        }
    }