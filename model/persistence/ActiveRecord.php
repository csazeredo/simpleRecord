<?php

namespace model\persistence;

/**
 *
 * @author cleber
 *        
 */
abstract class ActiveRecord 
{
	const ORDER_ASC  = 'ASC';
	const ORDER_DESC = 'DESC';
	
	private final $table;
	
	/**
	 * 
	 * @param unknown_type $table
	 */
	public function __construct($table)
	{
		$this->table = $table;
	}
	
	/**
	 * 
	 * @return PDOStatement
	 */
	public function selectALL()
	{
		$pdo = PDOConnection::getInstance(PDOConnection::PGSQL);
		
		// Comments
		$SQL = 'SELECT * FROM '. $this->table;
		
		$oRes = $pdo->query($SQL); 
		return $oRes;
	}
}

?>