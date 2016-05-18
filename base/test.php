<?php
class Test{
	public $workid;
	protected static $_workers = array();
	protected static $_ipmap = array();
	protected static $_pidfile;
	protected static $_pid;

	public function __construct(){
		$this->workid = spl_object_hash($this);
		self::$_workers[$this->workid] = $this;
		self::$_ipmap[$this->workid] = array();
		self::$_pidfile = 'test.pid';
		self::$_pid = posix_getpid();
		file_put_contents(self::$_pidfile, self::$_pid);
	}
	public function start(){
		$this->deamon();
		$this->parseCommand();
		echo 'hello world\n';
	}
	
	protected  function parseCommand(){
		global $argv;
		var_dump($argv);
	}
	
	protected function deamon(){
		$pid = pcntl_fork();
		echo 'pid='.$pid;
		if($pid === 0 ){
			exit(0);
		}
		posix_setsid();
	}
}