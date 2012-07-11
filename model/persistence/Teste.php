<?php

namespace model\persistence;

use model\persistence\ActiveRecord;
use exceptions\NullPointerException;

/**
 *
 * @author cleber
 *        
 */
class Teste extends ActiveRecord 
{
	private final $table = 'teste';
	
	/**
	 */
	function __construct() 
	{
		parent::__construct($this->table);
	}
	
	public function __toString()
	{
		$stmt   = $this->selectALL();
		$string = "";
		
		foreach($stmt as $row)
		{
			print_r($row);
		}
	}
	
}

?>