<?php

namespace exceptions;

/**
 * 
 * @author cleber
 *
 */
class NullPointerException extends \Exception
{
	/**
	 * 
	 * @param string $mensagem
	 */
	public function __construct($mensagem = null)
	{
		throwException($mensagem);
	}
}

?>