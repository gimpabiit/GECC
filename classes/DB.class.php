<?php
/**
* 
*/
class DB
{
	private static $instance = null;
	private $pdo, 
			$query, 
			$error = false, 
			$results, 
			$count = 0;
	
	private function __construct()
	{
		# code...
		try
		{
			$this->pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		}catch (PDOException $e) 
		{
			die($e->getMessage());
		}
	}

	public static function getInstance()
	{
		if (!isset(self::$instance)) {
			# code...
			self::$instance = new DB();
		}
		return self::$instance;
	}

	public function query($sql)
	{
		// echo($sql);
		// die;
		$this->error = false;
		if ($this->query = $this->pdo->prepare($sql)) {
			# code...
			
			if ($this->query->execute()) {
				# code...
				$this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
				$this->count = $this->query->rowCount();
			}
			else {
				$this->error = true;
			}
		}
		return $this;
	}

	public function action($action, $table, $where = array(), $extra = array())
	{
		$sql = "{$action} {$table}";
		if (count($where)) {
			# code...
			$sql .= " WHERE ";
			foreach ($where as $key => $value) {
				# code...
				if (strpos($key, '!') !== false) {
					# code...
					$sql.= "`". str_replace('!', '', $key)."` != '".$value ."' AND ";
				} else {
					$sql.= "`". $key."` = '".$value ."' AND ";
				}
			}
			$sql = substr($sql, 0, strlen($sql) - 4);
		}

		if (count($extra)) {
			# code...
			foreach ($extra as $value) {
				# code...
				$sql.= ' '. $value;
			}
		}
		$this->query($sql);
		return false;
	}

	public function get($table, $where = array(), $extra = array())
	{
		// var_dump($extra);
		return $this->action("SELECT * FROM", $table, $where, $extra);
	}

	public function delete($table, $where)
	{
		return $this->action("DELETE FROM", $table, $where);
	}

	public function insert($table, $fields = array())
	{
		if (count($fields)) {
			# code...
			$columns = '';
			$values = '';
			$x = 0;
			foreach ($fields as $key => $value) {
				# code...
				if ($key != 'action') {
					# code...
					if ($x==0) {
						# code...
						$columns = $columns."`".$key."` ";
						$values = $values."'".$value."' ";
					} else {
						$columns = $columns.", `".$key."` ";
						$values = $values.", '".$value."' ";
					}
				}
				$x++;
			}
			$sql = "INSERT  INTO `{$table}` ({$columns}) VALUES ({$values})";
			if (!$this->query($sql)->error()) {
				# code...
				return true;
			}
		}
		return false;
	}

	public function update($table, $id, $fields)
	{
		$set = '';
		$where = '';
		$x = 1;
		foreach ($fields as $name => $field) {
			# code...
			$set.="`{$name}` = '{$field}'";
			if ($x < count($fields)) {
				# code...
				$set.=', ';
			}
			$x++;
		}

		$x = 1;
		foreach ($id as $key => $value) {
			# code...
			$where .= "`{$key}` = '{$value}'";
			if ($x < count($id)) {
				# code...
				$where.=' AND ';
			}
			$x++;
		}
		$sql = "UPDATE `{$table}` SET {$set} WHERE {$where}";
		// echo $sql;
		if (!$this->query($sql)->error()) {
			# code...
			return true;
		}
		return false;
	}

	public function error() 
	{
		return $this->error;
	}

	public function results()
	{
		return $this->results;
	}

	public function count()
	{
		return $this->count;
	}
}
