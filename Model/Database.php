<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
//date_default_timezone_set('UTC');


include 'add_database.class.php';
include 'find_most.class.php';
include 'find_recipe.class.php';
include 'find_comment.class.php';
include 'search.class.php';
include 'find_step.class.php';
include 'mail.class.php';
include 'autoimplement.class.php';

class Database 
{
	public function try_connection()
	{
		try
		{
			$bdd =  (new PDO('mysql:host=localhost;port=9998;', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)));
			$bdd->query("SET NAMES utf8");
			$bdd->query("USE marmiton");
		}
		catch(PDOException $e)
		{
			return FALSE;
		}
		return $bdd;
	}
}

?>