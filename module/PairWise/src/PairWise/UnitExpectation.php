<?php
namespace PairWise;

class UnitExpectation
{
	protected $_method;
	protected $_args;
	protected $_return;

	public function __construct($call)
	{
		$this->_method = $call['name'];
		$this->_args = $call['args'];
		$this->_return = $call['return'];
	}

	public function verifyOutput($closure)
	{
		return $closure->__invoke($this->_return);
	}
