<?php
	class Db
	{
		private $host;
		private $user;
		private $pass;
		private $name; //Database name
		private $mysqli;

		private $table;
		private $fields;
		private $wheres;
		private $limit;
		private $offset;

		public function Db($name, $host = "127.0.0.1", $user = "root", $pass = "root")
		{
			$this->host = $host;
			$this->user = $user;
			$this->pass = $pass;
			$this->name = $name;
			$this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->name);
		}

		public function select($fields)
		{
			if(is_array($fields))
				$this->fields = $fields;
			else
				$this->fields = array($fields);

			return $this;
		}

		public function table($table_name)
		{
			$this->table = $table_name;
			return $this;
		}

		public function where($field,$operator,$value)
		{
			$this->wheres[] = $field.$operator.'"'.$value.'"';
			return $this;
		}

		public function limit($limit)
		{
			$this->limit = $limit;
			return $this;
		}

		public function offset($offset)
		{
			$this->offset = $offset;
			return $this;
		}

		public function execute()
		{
			
			if(count($this->fields)>0)
				$select = implode(',', $this->fields);
			else
				$select = "*";
			
			$where = '';
			if(count($this->wheres)>0)
				$where = ' WHERE ' . implode(' AND ',$this->wheres);

			$limit = "";
			if($this->limit != "")
				$limit = " LIMIT ". $this->limit;

			$offset = "";
			if($this->offset != "")
				$offset = " OFFSET ".$this->offset;
			
			echo $q = "SELECT ".$select. " FROM ".$this->table . $where . $limit . $offset;
			$r = $this->mysqli->query($q);
			return $this->return_items($r);
		}

		private function return_items($r)
		{
			$items = array();
			while($item = mysqli_fetch_assoc($r))
				$items[] = $item;
			return $items;
		}

		public function all($table)
		{
			$q = "SELECT * FROM " . $table;
			$r = $this->mysqli->query($q);
			return $this->return_items($r);
		}


	}
?>