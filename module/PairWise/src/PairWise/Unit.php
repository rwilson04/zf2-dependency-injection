<?php
namespace PairWise;

class Unit 
{
	protected $_class;
	protected $_calls;
	protected $_constructorArgs;

	protected $_object;

	public function __construct($class)
	{
		$this->_class = $class;
		$args = func_get_args();
		array_shift($args);
		$rc = new \ReflectionClass($class);
		$object = $rc->newInstanceArgs($args);
		$this->_object = $object;
	}

	public function __call($name, $args)
	{

		//$object = $rc->newInstanceArgs($this->_constructorArgs);
		$object = $this->_object;
		$methods = get_class_methods($object);
		if (!in_array($name, $methods))
		{
			echo "$name not in " . get_class($object) . " method list\n";
			return false;
		}
		$return = call_user_func_array(array($object, $name), $args);
		$call = compact('name','args', 'return');
		$this->_calls[] = $call;
		echo "name:$name, args:(".join($args)."), return:$return \n";
		$this->_return = $return;
		return new UnitExpectation($call);
	}

	public function testPair()
	{
		echo "testing unit pair \n";
		if (count($this->_calls))
		{
			foreach ($calls
			print_r($this->_calls);
			i
		}
	}
}
