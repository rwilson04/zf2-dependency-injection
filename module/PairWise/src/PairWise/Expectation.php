<?php
namespace PairWise;

class Expectation
{
	protected $_method;
	protected $_value;

	public function __construct($method)
	{
		$this->_method = $method;
	}

	public function getMethod()
	{
		return $this->_method;
	}

	public function andReturn($value)
	{
		$this->_value = $value;
	}

	public function returnForMethod($method)
	{
		return $this->_value;
	}
}

