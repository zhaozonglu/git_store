<?php
class Container
{
	protected $binds;

	protected $instances;

	public function bind($abstract, $concrete)
	{
		echo '<br>--'.$abstract.'---<br>';
		if ($concrete instanceof Closure) {
			$this->binds[$abstract] = $concrete;
		} else {
			$this->instances[$abstract] = $concrete;
		}
	}

	public function make($abstract, $parameters = [])
	{
		if (isset($this->instances[$abstract])) {
			return $this->instances[$abstract];
		}
		array_unshift($parameters, $this); //第一个参数在这里加入的
		return call_user_func_array($this->binds[$abstract], $parameters);
	}
	public function getbinds(){
		return $this->binds;
	}
	public function getinstances(){
		return $this->instances;
	}
}