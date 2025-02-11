<?php
// 155. Min Stack    
class MinStack {
    /**
     */
    private $stack = [];
    private $minValue = null; 
    function __construct() {
        
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val): void {
        if (!is_null($val)) {
            if ($this->minValue === null) {
                $this->minValue = $val;
            }
            else {
                $this->minValue = min($this->minValue, $val);
            }
        }
        $this->stack[] = $val;
    }
  
    /**
     * @return NULL
     */
    function pop(): void {
        if (count($this->stack) > 0) {
            $val = array_pop($this->stack);
            if ($val === $this->minValue) {
                if (count($this->stack) > 0) {
                    $arrayMin = min($this->stack);
                    if (!is_null($arrayMin)) {
                        $this->minValue = $arrayMin;
                    }
                }
                else { $this->minValue = null; }
            }
        }
    }
  
    /**
     * @return Integer
     */
    function top() {
        return $this->stack[count($this->stack)-1];
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return $this->minValue;
    }
}

$minStack = new MinStack();
$minStack->push(-2);
$minStack->push(0);
$minStack->push(-3);
print_r($minStack->getMin()); // return -3
$minStack->pop();
print_r($minStack->top());    // return 0
print_r($minStack->getMin()); // return -2  

?>