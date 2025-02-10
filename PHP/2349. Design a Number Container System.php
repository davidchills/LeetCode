<?php
// 2349. Design a Number Container System
class NumberContainers {

    private array $indexToNumber = [];  // Maps index -> number
    private array $numberToIndices = []; // Maps number -> min heap of indices
    /**
     */
    public function __construct() {
        
    }
  
    /**
     * @param Integer $index
     * @param Integer $number
     * @return NULL
     */
    public function change(int $index, int $number): void {
        // If index already exists, remove it from the old number's heap
        if (isset($this->indexToNumber[$index])) {
            $oldNumber = $this->indexToNumber[$index];
            if ($oldNumber === $number) return; // No change, avoid redundant work

            // Lazy remove from heap by setting a marker
            $this->indexToNumber[$index] = null;
        }

        // Update index with new number
        $this->indexToNumber[$index] = $number;

        // Add index to min heap for this number
        if (!isset($this->numberToIndices[$number])) {
            $this->numberToIndices[$number] = new SplMinHeap();
        }
        $this->numberToIndices[$number]->insert($index);
    }
  
    /**
     * @param Integer $number
     * @return Integer
     */
    public function find(int $number): int {
        if (!isset($this->numberToIndices[$number]) || $this->numberToIndices[$number]->isEmpty()) return -1;

        // Ensure the min heap returns a valid index
        while (!$this->numberToIndices[$number]->isEmpty()) {
            $minIndex = $this->numberToIndices[$number]->top();
            if (isset($this->indexToNumber[$minIndex]) && $this->indexToNumber[$minIndex] === $number) {
                return $minIndex; // Found the valid smallest index
            }
            // Otherwise, remove stale values from heap
            $this->numberToIndices[$number]->extract();
        }

        return -1; // No valid indices left
    }
}

$nc = new NumberContainers();
/*
print_r($nc->find(10)); // There is no index that is filled with number 10. Therefore, we return -1.
print "\n";
$nc->change(2, 10); // Your container at index 2 will be filled with number 10.
$nc->change(1, 10); // Your container at index 1 will be filled with number 10.
$nc->change(3, 10); // Your container at index 3 will be filled with number 10.
$nc->change(5, 10); // Your container at index 5 will be filled with number 10.
print_r($nc->find(10)); // Number 10 is at the indices 1, 2, 3, and 5. Since the smallest index that is filled with 10 is 1, we return 1.
print "\n";
$nc->change(1, 20); // Your container at index 1 will be filled with number 20. Note that index 1 was filled with 10 and then replaced with 20. 
print_r($nc->find(10)); // Number 10 is at the indices 2, 3, and 5. The smallest index that is filled with 10 is 2. Therefore, we return 2.
*/
//$nc->change(null, null); 
$nc->change(1, 10);
$nc->change(1, 10);
print_r($nc->find(10));
print "\n";
$nc->change(1, 20);
print_r($nc->find(10));
print "\n";
?>