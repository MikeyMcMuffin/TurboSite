<?php
class DB {
	private static $_instance = null;
	private $_pdo, 
			$_query, 
			$_error = false, 
			$_results, 
			$_count = 0;

	private function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/DBhost') . ';dbname=' . Config::get('mysql/DBname'),Config::get('mysql/DBusername'),Config::get('mysql/DBpassword'));
			echo 'Connected';
		} catch(PDOExeption $e){
			die($e->getMessage());
		}
	}
	//checks connection to a our database. Checks if there is already a instance of a connection, if not gets a new connection.
	public static function getInstance() {
		if(!isset(self::$_instance)){
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql, $params = array()) {
		$this->_error = false;

		if($this->_query = $this->_pdo->prepare($sql)){ //if there is an instance of query and pdo continue
			$x = 1;
			if(count($params)){
				foreach($params as $param){
					$this->_query->bindValue($x, $param); // loops through parameters and add a number value to each. Incrementing on each param
					$x++;
				}

			}
			if($this->_query->execute()){ //Checks if query has executed with no errors. If there is no errors then return result set 
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowcount();
			}else{ //return error
				$this->_error = true;
			}
		}

		return $this;
	}

	//Performs SQL action based on variablees 
	private function action($action, $table, $where = array()){
		if(count($where) === 3){ //checks that where array has 3 entries. Example ('field, operator, value') (name, =, mikey)
			$operators = array('=', '>', '<', '>=', '<=');

			$field		=$where[0]; //eg name
			$operator	=$where[1]; //eg =
			$value 		=$where[2]; //eg mikey

			if(in_array($operator, $operators)){ //checks if the operator entry matches any exeptable operators from the array
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? "; //eg "SELECT * FROM users WHERE username = 'mikey' ";

				if(!$this->query($sql, array($value))->error()){
					return $this;
				}
			}
		}
		return $this;

	}

	//runs get, using the action method
	public function get($table, $where){
		return $this->action('SELECT *', $table, $where);
	}

	public function delete($table, $where){
		return $this->action('DELETE *', $table, $where);
	}

	public function results(){ //returns cerrent results
		return $this->_results;
	}

	public function first() { //returns first result
		return $this->results()[0];
	}


	public function error() { //Gets the value of error boolean
		return $this->_error;
	}

	public function count() { //returns current number of entries
		return $this->_count;
	}
}