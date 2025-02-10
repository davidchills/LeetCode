<?php
class RandomizedSet {
    /**
     */
	private $collection = array();
	
    function __construct() {
        
    }
  
    /**
     * @param Integer $val
     * @return Boolean
     */
    function insert($val): bool {
		if (!array_key_exists($val, $this->collection)) {
			$this->collection[$val] = $val;
			return true;
		}
		return false;
    }
  
    /**
     * @param Integer $val
     * @return Boolean
     */
    function remove($val): bool {
		if (array_key_exists($val, $this->collection)) {
			unset($this->collection[$val]);
			return true;
		}
		return false;
    }
  
    /**
     * @return Integer
     */
    function getRandom(): int {
        return array_rand($this->collection, 1);
    }
}
	
$obj = new RandomizedSet();
print ($obj->insert(1) === true) ? 'true' : 'false'; print "\n";// true
print ($obj->remove(2) === true) ? 'true' : 'false'; print "\n"; // false
print ($obj->insert(2) === true) ? 'true' : 'false'; print "\n";// true
print $obj->getRandom(); print "\n"; // 1 or 2
print ($obj->remove(1) === true) ? 'true' : 'false'; print "\n"; // true
print ($obj->insert(2) === true) ? 'true' : 'false'; print "\n";// false
print $obj->getRandom(); print "\n"; // 2
?>