<?php
/*
We are given an array asteroids of integers representing asteroids in a row. 
    The indices of the asteriod in the array represent their relative position in space.
For each asteroid, the absolute value represents its size, and the sign represents its direction (positive meaning right, negative meaning left). 
    Each asteroid moves at the same speed.
Find out the state of the asteroids after all collisions. If two asteroids meet, the smaller one will explode. 
    If both are the same size, both will explode. Two asteroids moving in the same direction will never meet.
*/
class Solution {

    /**
     * 735. Asteroid Collision
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    function asteroidCollision($asteroids) {
        $stack = [];

        foreach ($asteroids as $rock) {
            while (!empty($stack) && end($stack) > 0 && $rock < 0) {
                $last = array_pop($stack);
                
                if (abs($last) === abs($rock)) {
                    $rock = 0;
                    break;
                }

                if (abs($last) > abs($rock)) {
                    $stack[] = $last;
                    $rock = 0;
                    break;
                }
            }
            
            if ($rock !== 0) {
                $stack[] = $rock;
            }
        }
        
        return $stack;
    }
}

$c = new Solution;
print_r($c->asteroidCollision([5,10,-5])); // Expect [5,10]
//print_r($c->asteroidCollision([8,-8])); // Expect []
//print_r($c->asteroidCollision([10,2,-5])); // Expect [10]
//print_r($c->asteroidCollision([-2,-1,1,2])); // Expect [-2,-1,1,2]
//print_r($c->asteroidCollision([1,-2,-2,-2])); // Expect [-2,-2,-2]
//print_r($c->asteroidCollision([1, 2, 3, 4, 5])); // Expect [1, 2, 3, 4, 5]   
//print_r($c->asteroidCollision([100])); // Expect [100]
//print_r($c->asteroidCollision([5, 10, -5, -10, 15, -20])); // Expect [-20]
?>