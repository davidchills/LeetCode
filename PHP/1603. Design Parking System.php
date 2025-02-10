<?php
class ParkingSystem {
    /**
     * @param Integer $big
     * @param Integer $medium
     * @param Integer $small
     */
	
	private $big = 0;
	private $medium = 0;
	private $small = 0;
	
    function __construct(Int $big, Int $medium, Int $small) {
        $this->big = intval($big);
		$this->medium = intval($medium);
		$this->small = intval($small);
    }
  
    /**
     * @param Integer $carType
     * @return Boolean
     */
    function addCar(Int $carType) {
        if ($carType == 1) {
			if ($this->big > 0) {
				$this->big -= 1;
				return true;
			}
		}
        elseif ($carType == 2) {
			if ($this->medium > 0) {
				$this->medium -= 1;
				return true;
			}
		}
        elseif ($carType == 3) {
			if ($this->small > 0) {
				$this->small -= 1;
				return true;
			}
		}	
		return false;
    }
}
$s = new ParkingSystem(1, 1, 0);
print ($s->addCar(1)) ? "TRUE\n" : "FALSE\n";
print ($s->addCar(2)) ? "TRUE\n" : "FALSE\n";
print ($s->addCar(3)) ? "TRUE\n" : "FALSE\n";
print ($s->addCar(1)) ? "TRUE\n" : "FALSE\n";
//print ($s->addCar(1)) ? "TRUE\n" : "FALSE\n";
//print ($s->addCar(1)) ? "TRUE\n" : "FALSE\n";
/**
 * Your ParkingSystem object will be instantiated and called as such:
 * $obj = ParkingSystem($big, $medium, $small);
 * $ret_1 = $obj->addCar($carType);
 */	
?>