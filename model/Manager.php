<?php

class Manager
{
	protected function dbConnect()
	{
	    $db = new PDO('mysql:host=localhost;dbname=test1;charset=utf8', 'root', '');
	    return $db;
	}
}