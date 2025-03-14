<?php
/*
You have a RecentCounter class which counts the number of recent requests within a certain time frame.
Implement the RecentCounter class:
RecentCounter() Initializes the counter with zero recent requests.
int ping(int t) Adds a new request at time t, where t represents some time in milliseconds, and returns the number of requests that has happened in the past 3000 milliseconds (including the new request). Specifically, return the number of requests that have happened in the inclusive range [t - 3000, t].
It is guaranteed that every call to ping uses a strictly larger value of t than the previous call.
    
933. Number of Recent Calls    
*/
class RecentCounter {
    /**
     */
    private $queue;
    public function __construct() {
        $this->queue = new SplQueue();
    }
  
    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t) {
        while (!$this->queue->isEmpty() && $this->queue->bottom() < $t - 3000) {
            $this->queue->dequeue();
        }
        $this->queue->enqueue($t);
        return $this->queue->count();
    }
}

$c = new RecentCounter();
print $c->ping(1)."\n"; // Expect 1
print $c->ping(100)."\n"; // Expect 2
print $c->ping(3001)."\n"; // Expect 3
print $c->ping(3002)."\n"; // Expect 3

?>