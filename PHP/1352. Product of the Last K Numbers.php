<?php
/*
Design an algorithm that accepts a stream of integers and retrieves the product of the last k integers of the stream.

Implement the ProductOfNumbers class:

ProductOfNumbers() Initializes the object with an empty stream.
void add(int num) Appends the integer num to the stream.
int getProduct(int k) Returns the product of the last k numbers in the current list. You can assume that always the current list has at least k numbers.
The test cases are generated so that, at any time, the product of any contiguous sequence of numbers will fit into a single 32-bit integer without overflowing.
*/
class ProductOfNumbers {
    /**
     */
    private $stack = [1];
    
    function __construct() {
        $this->stack = [1];
    }
  
    /**
     * @param Integer $num
     * @return NULL
     */
    function add(int $num): void {
        if ($num === 0) {
            $this->stack = [1];
        }
        else {
            $this->stack[] = end($this->stack) * $num;
        }
    }
  
    /**
     * @param Integer $k
     * @return Integer
     */
    function getProduct(int $k): int {
        $n = count($this->stack);
        if ($k >= $n) { return 0; }        
        return $this->stack[$n - 1] / $this->stack[$n - 1 - $k];
    }
}

$p = new ProductOfNumbers();
$p->add(3);
$p->add(0);
$p->add(2);
$p->add(5);
$p->add(4);
print $p->getProduct(2)."\n"; // Expect 20
print $p->getProduct(3)."\n"; // Expect 40
print $p->getProduct(4)."\n"; // Expect 0
$p->add(8);
print $p->getProduct(2)."\n"; // Expect 32
?>