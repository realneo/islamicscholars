<?php
/**
 * Queue with memcacheQ
 * Create By Chris Wong 2011-7-1 
 * (bool)queueSet() : set options to memecacheQ ;
 * (bool)queueGet() : get options with name in memcacheQ;
 */
if (! defined ( 'BASEPATH' ))exit ( 'No direct script access allowed' );

class Memcacheq_library {
	
	private $config;
	private $q;
	private $ci;
	protected $errors = array ();
	
	public function __construct() {
		$this->ci = & get_instance ();
		
		$this->ci->load->config ( 'memcacheq' );
		$this->config = $this->ci->config->item ( 'memcacheq' );
		extract ( $this->config ['servers'] );

		$this->q = new Memcache ();
		$result = $this->q->connect ( $host, $port );
		if ($result === false) {
			$this->errors [] = 'Memcacheq Library: Could not connect to the server';
		}
	}
	
	public function queueSet($name, $queue) {
		extract ( $this->config ['config'] );
		if (is_array ( $queue )) {
			foreach ( $queue as $multi ) {
				$status = $this->q->set ( $name, $multi, $flage, $expiration );
			}
		} else {
			$status = $this->q->set ( $name, $queue, $flage, $expiration );
		}
		return $status;
	}
	
	public function queueGet($name) {
		if ($this->q) {
			if (is_null ( $name )) {
				$this->errors [] = 'The name value cannot be NULL';
				return FALSE;
			}
			return $this->q->get ( $name );
		}
		return FALSE;
	}
	
	public function __destruct() {
		if ($this->q instanceof Memcache) {
			$this->q->close ();
		}
	}
}	
/* End of file memcached_library.php */
/* Location: ./application/libraries/memcached_library.php */