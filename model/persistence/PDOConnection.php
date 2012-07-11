<?php

namespace model\persistence;

use exceptions\NullPointerException;

/**
 *
 * @author cleber
 *        
 */
class PDOConnection 
{
	const MSSQL	  = 'MSSQL';
	const MYSQL  = 'MYSQL';
	const PGSQL  = 'PGSQL';
	const ORACLE = 'ORACLE';
	
	private $pdo;
	
	private final $user = 'postgres';
	private final $pass = 'postgres';
	
	private static $instance;
	
	private static final $pgsql  = 'pgsql:dbname=exempledb;host=localhost';
	private static final $mysql  = 'mysql:dbname=exempledb;host=localhost';
	private static final $mssql  = 'mssql:dbname=exempledb;host=localhost';
	private static final $oracle = 'pgsql:dbname=exempledb;host=localhost';
	
	/**
	 * 
	 * @param $dataConnection
	 */
	private function __construct($dataConnection) 
	{
		$this->pdo = new \PDO($dataConnection, $this->user, $this->pass);				
	}
	
	/**
	 * 
	 * @param unknown_type $databaseConnection
	 * @return \PDO
	 */
	public static function getInstance($databaseConnection)
	{
		if(empty($databaseConnection))
		{
			throw new NullPointerException('Dados para conexão com o banco de dados nulo');
		}
		else
		{
			if(empty(self::$instance))
			{
				if(self::PGSQL == $databaseConnection)
				{
					self::$instance = new PDOConnection(self::$pgsql);
				}
				else if(self::MYSQL == $databaseConnection)
				{
					self::$instance = new PDOConnection(self::$mysql);
				}
				else if(self::ORACLE == $databaseConnection)
				{
					self::$instance = new PDOConnection(self::$oracle);
				}
				else if(self::MSSQL == $databaseConnection)
				{
					self::$instance = new PDOConnection(self::$mssql);
				} 
			}
			return self::$instance->pdo;
		}
	}
}

?>