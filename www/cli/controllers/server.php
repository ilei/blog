<?php

/**
 * swoole server 用于异步消息推送 
 * 	需要安装 php swoole扩展 v1.7.15 及以上
 *
 * CT 2015-05-06 15:00 by wangleiming
 * */

class Server extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

	/**
	 * 启动server 只能运行在cli模式下
	 * php index.php cli/server/startServer
	 *
	 * @access public 
	 * @param  void 
	 * @return void 
	 * @author wangleiming 
	 **/ 

	public function startServer(){
		$serv = new swoole_server('127.0.0.1', 9501);
		$serv->set(array(
			'worker_num'      => 2,
			'task_worker_num' => 4,
			'dispatch_mode'   => 2,
			'daemonize'       => 0,
			'log_file'        => '',
		));
		$serv->on('Start',    array($this, 'onStart'));
		$serv->on('Connect',  array($this, 'onConnect'));
		$serv->on('Receive',  array($this, 'onReceive'));
		$serv->on('Close',    array($this, 'onClose'));
		$serv->on('Shutdown', array($this, 'onShutdown'));
		$serv->on('Timer',    array($this, 'onTimer'));
		$serv->on('Task',     array($this, 'onTask'));
		$serv->on('Finish',   array($this, 'onFinish'));
		$serv->on('WorkerStart', array($this, 'onWorkerStart'));
		$serv->on('WorkerStop',  array($this, 'onWorkerStop'));
		$serv->on('WorkerError', array($this, 'onWorkerError'));
		$serv->start();
	}

	public function onStart($server){
		echo "MasterPid={$server->master_pid}|Manager_pid={$server->manager_pid}\n";
		echo "Server: start.Swoole version is [".SWOOLE_VERSION."]\n";
	}

	public function onShutdown($server){
		echo "Server: onShutdown\n";
	}

	public function onTimer($server, $interval){
	    			
		echo "Server:Timer Call.Interval=$interval\n";
	}

	public function onClose($server, $fd, $from_id){
		echo "Client: fd=$fd is closed.\n";
	}

	public function onConnect($server, $fd, $from_id){
		echo "Client:{$fd} Connect.\n";
	}

	public function onWorkerStart($server, $worker_id){
		global $argv;
		if($worker_id >= $server->setting['worker_num']) {
			swoole_set_process_name("php {$argv[0]} task worker");
		} else {
			swoole_set_process_name("php {$argv[0]} event worker");
		}

		echo "WorkerStart|MasterPid={$server->master_pid}|Manager_pid={$server->manager_pid}|WorkerId=$worker_id\n";
	}

	public function onWorkerStop($server, $worker_id){
		echo "WorkerStop[$worker_id]|pid=".posix_getpid().".\n";
	}

	/**
	 * 接收客户端请求 
	 *
	 * @access public 
	 * @return void 
	 **/ 

	public function onReceive(swoole_server $serv, $fd, $from_id, $rdata){
		$data = json_decode($rdata, true);
		if (isset($data['cmd']))
		{
			switch ($data['cmd'])
			{
			case 'sync_send':
				$s = microtime(true);
				$res = $serv->taskwait($data, 0.5, 0);
				echo "use " . ((microtime(true) - $s) * 1000) . "ms\n";
				$serv->send($fd, PHP_EOL . "get " . $res['key'] . ": " . $res['val']);
				break;
				//执行任务 调用onTask函数
			case "send":
				$serv->task($data, 0);
				$serv->send($fd, "OK\n");
				break;
			case "tick":
				$serv->tick(3000, function() use($serv, $fd, $data){
					$serv->task($data, 0);	
				});
				break;
			default:
				echo "ERROR CMD \n";
			}
		}
	}

	/**
	 * 执行任务 
	 *
	 * @access public 
	 * @return void 
	 **/

	public function onTask(swoole_server $server, $task_id, $from_id, $data){
		$object = isset($data['object']) && $data['object'] ? unserialize($data['object']) : $this;
		$method = isset($data['method']) && $data['method'] ? $data['method'] : 'callback';
		$class  = isset($data['class'])  && $data['class']  ? $data['class']  : '';
		if (isset($data['cmd']))
		{
			switch ($data['cmd']) {
			case "send":
			case "tick":
				if($object){
					call_user_func_array(array($object, $method), array());
				}elseif($class){
					call_user_func_array("{$class}::{$method}", $data['args']); 
				}
				break;
			default:
				$server->finish("ERROR CMD");
			}
		}
		echo "AsyncTask[PID=".posix_getpid()."]: task_id=$task_id.".PHP_EOL;
		$server->finish("OK");
	}

	public function onFinish(swoole_server $serv, $data){
		echo "AsyncTask Finish:Connect.PID=".posix_getpid().PHP_EOL;
	}

	public function onWorkerError(swoole_server $serv, $data){
		echo "worker abnormal exit. WorkerId=$worker_id|Pid=$worker_pid|ExitCode=$exit_code\n";
	}

	public static function res_crawl($url, $sub_url = '', $model = null){
		$CI = &get_instance();
		static $pages = array();	
		static $old = array();
		$url = $url . $sub_url;
		$content = self::curl($url);
		$CI->load->library('DOM');
		echo $url;
		$content = self::curl($url);
		$dom = $CI->dom->init($content);
		$page = "//*[@id=\"list1\"]/li";
		$elements = $dom->find($page);
		if(!$elements){
			return;
		}
		$data = array();
		foreach($elements as $value){
			$data['sign_title'] = strip_tags($value);
			$data['cate_id'] = 117;
			$i = $model->save($data);
			var_dump($i);
		}
	}
	
	public static function curl($url){
		$options = array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT        => 30,
		);
		$ch = curl_init($url);
		curl_setopt_array($ch, $options);
		$tmp = curl_exec($ch);
		curl_close($ch);
		return $tmp;
	}

	public function callback(){
		$url = "http://www.qqgexingqianming.com/chengshu/";
	    $CI = &get_instance();
		$CI->load->model('QQSign');		
		for($i = 0; $i < 16; $i++){
			$sub_url = $i ? $i . '.htm' : '';
			self::res_crawl($url, $sub_url, $CI->QQSign);	
		}
		echo 'ok';
	}

}

