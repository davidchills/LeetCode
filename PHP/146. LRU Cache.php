<?php
/*
Design a data structure that follows the constraints of a Least Recently Used (LRU) cache.

Implement the LRUCache class:

LRUCache(int capacity) Initialize the LRU cache with positive size capacity.
int get(int key) Return the value of the key if the key exists, otherwise return -1.
void put(int key, int value) Update the value of the key if the key exists. 
    Otherwise, add the key-value pair to the cache. If the number of keys exceeds the capacity from this operation, evict the least recently used key.
The functions get and put must each run in O(1) average time complexity.
*/
// 146. LRU Cache
    
class LRUNode {
    public $key;
    public $value;
    public $prev = null;
    public $next = null;
    
    function __construct($key, $value) {
        $this->key = $key;
        $this->value = $value;
    }
}
    
class LRUCache {
    /**
     * @param Integer $capacity
     */
    private $capacity = 0;
    private $cache = [];
    private $head;
    private $tail;
    
    public function __construct(int $capacity) {
        $this->capacity = $capacity;
        $this->head = new LRUNode(0, 0);
        $this->tail = new LRUNode(0, 0);
        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;        
    }
  
    /**
     * @param Integer $key
     * @return Integer
     */
    public function get(int $key): int {
        if (!isset($this->cache[$key])) {
            return -1;
        }
        
        $node = $this->cache[$key];
        $this->moveToHead($node);
        return $node->value;        
    }
  
    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    public function put(int $key, int $value): void {
        if (isset($this->cache[$key])) {
            // Update existing node and move it to head
            $node = $this->cache[$key];
            $node->value = $value;
            $this->moveToHead($node);
        } 
        else {
            // Create new node
            $newNode = new LRUNode($key, $value);
            $this->cache[$key] = $newNode;
            $this->addNode($newNode);
            
            if (count($this->cache) > $this->capacity) {
                $this->removeLRUNode();
            }
        }        
    }
    
    private function addNode(LRUNode $node): void {
        $node->next = $this->head->next;
        $node->prev = $this->head;
        $this->head->next->prev = $node;
        $this->head->next = $node;
    }

    private function removeNode(LRUNode $node): void {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
    }

    private function moveToHead(LRUNode $node): void {
        $this->removeNode($node);
        $this->addNode($node);
    }

    private function removeLRUNode(): void {
        $lru = $this->tail->prev;
        $this->removeNode($lru);
        unset($this->cache[$lru->key]);
    }    
}

$c = new LRUCache(2);
$c->put(1, 1);
$c->put(2, 2);
print_r($c->get(1)); // Expect 1
$c->put(3, 3);
print_r($c->get(2)); // Expect -1
$c->put(4, 4);
print_r($c->get(1)); // Expect -1
print_r($c->get(3)); // Expect 3
print_r($c->get(4)); // Expect 4
?>