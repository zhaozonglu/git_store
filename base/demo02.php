<?php
require 'container.php';

interface SuperModuleInterface
{
	/**
	 * 超能力激活方法
	 *
	 * 任何一个超能力都得有该方法，并拥有一个参数
	 *@param array $target 针对目标，可以是一个或多个，自己或他人
	 */
	public function activate(array $target);
}

/**
 * X-超能量
 */
class XPower implements SuperModuleInterface
{
	public function __construct(){
		echo '<br>----xpower---start---<br>';
	}
	public function activate(array $target)
	{
		// 这只是个例子。。具体自行脑补
	}
}

/**
 * 终极炸弹 （就这么俗）
 */
class UltraBomb implements SuperModuleInterface
{
	public function __construct(){
		echo '<br>----ultrabomb--<br>';
	}
	public function activate(array $target)
	{
		// 这只是个例子。。具体自行脑补
	}
}
class Superman
{
	protected $module;
	public function __construct(SuperModuleInterface $module)
	{
		echo '<br>---superman start--<br>';
		$this->module = $module;
	}
}

// 创建一个容器（后面称作超级工厂）
$container = new Container;

// 向该 超级工厂 添加 超人 的生产脚本
$container->bind('superman', function($container, $moduleName) {
	echo '<br>--bind superman---function--<br>';
	var_dump($container);
	echo '<br>';
	var_dump($moduleName);
	echo '<br>';
	return new Superman($container->make($moduleName));
});

// 向该 超级工厂 添加 超能力模组 的生产脚本
$container->bind('xpower', function($container) {
	echo '<br>bind xpower ---function--<br>';
	return new XPower;
});

// 同上
$container->bind('ultrabomb', UltraBomb::class);



// ******************  华丽丽的分割线  **********************
//开始启动生产
echo 'begin---<br>';
$superman_1 = $container->make('superman', ['xpower']);
echo 'end--<br>';
var_dump($superman_1);
exit;
$superman_2 = $container->make('superman', 'ultrabomb');
$superman_3 = $container->make('superman', 'xpower');
			
			