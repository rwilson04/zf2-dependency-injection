<?php
namespace PairWise;

class Mock
{

	protected $_expectations;

	protected $_class;
	protected $_constructorArgs;

	public function __construct($class)
	{
		$this->_class = $class;
		$args = func_get_args();
		array_shift($args);
		$this->_constructorArgs = $args;
	}

	public function __call($name, $args)
	{
		if (count($this->_expectations))
		{
			foreach ($this->_expectations as $expectation)
			{
				if ($name === $expectation->getMethod())
				{
					return $expectation->returnForMethod($name);
				}
			}
		}
		throw new \BadMethodCallException("Method '$name' not found");
	}

	public function shouldReceive($method)
	{
		$expectation = new Expectation($method);
		$this->_expectations[] = $expectation;
		return $expectation;
	}

	public function testPair()
	{
		//$object = new $this->_class($this->_constructorArgs);
		//$object = new \Building\Model\Brick($this->_constructorArgs);
		//$object = call_user_func_array('new \Building\Model\Brick', $$this->_constructorArgs);
		//$rc = new \ReflectionClass('\Building\Model\Brick');
		$rc = new \ReflectionClass($this->_class);
		$object = $rc->newInstanceArgs($this->_constructorArgs);
		if (count($this->_expectations))
		{
			foreach ($this->_expectations as $expectation)
			{
				$method = $expectation->getMethod();
				$with = null;
				//$methods = get_class_methods($object);
				//if (!in_array($method, $methods))
				//{
				//	echo "$method not in " . get_class($object) . " method list\n";
				//	return false;
				//}
				if (!is_callable(array($object, $method))) //always 'true' if __call implemented
				{
					echo "$method not callable for " . get_class($object) . " \n";
					return false;
				}
				$value = $object->$method($with);
				$returned = $expectation->returnForMethod($method);
				if ($value === $returned)
				{
					echo "$method success, " . $value . " === " . $returned . "\n";
				}
				else
				{
					echo "$method fail, " . $value . " !== " . $returned . "\n";
					return false;
				}
			}
			return true;
		}
	}

}
