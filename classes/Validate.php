<?php
class Validate{
	private $_passed = false,
			$_errors = array(),
			$_db =null;


	public function __construct() { //changes DB to connection instance of Database
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array()) {
		foreach($items as $item => $rules) { // Iterates through items (eg item username) and get the rules (eg username min chars)
			foreach($rules as $rule => $rule_value){ // Iterates througn rule values (eg username min value is 5)
				$value = trim($source[$item]);
				$item = escape($item);

				if($rule === 'required' && $rule_value && empty($value)) { //if required feild is left empty then add error to the error array
					$this->addError("{$item} is required");
				}else if(!empty($value)){
					switch($rule){
						case 'min':
							if(strlen($value) < $rule_value){
								$this->addError("{$item} must be a minmum of {$rule_value}");
							}

						break;
						case 'max':
							if(strlen($value) > $rule_value){
								$this->addError("{$item} must be a max of {$rule_value}");
							}

						break;
						case 'matches':
							if($value != $source[$rule_value]){
								$this->addError("{$rule_value} must match {$item}");
							}

						break;
						case 'unique':
							$check = $this->_db->get($rule_value, array($item, "=", $value));
							if($check->count()){
								$this->addError("{$item} already Exists");
							}
						break;

					}

				}
			}
		}

		if(empty($this->_errors)){ //If there are no errors, then set passed to true
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($error) {
		$this->_errors[] = $error;
	}

	public function errors() {
		return $this->_errors;
	}

	public function passed(){
		return $this->_passed;
	}
}