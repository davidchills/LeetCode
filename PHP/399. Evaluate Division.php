<?php
/*
You are given an array of variable pairs equations and an array of real numbers values, 
    where equations[i] = [Ai, Bi] and values[i] represent the equation Ai / Bi = values[i]. 
    Each Ai or Bi is a string that represents a single variable.
You are also given some queries, where queries[j] = [Cj, Dj] represents the jth query where you must find the answer for Cj / Dj = ?.
Return the answers to all queries. If a single answer cannot be determined, return -1.0.
Note: The input is always valid. You may assume that evaluating the queries 
    will not result in division by zero and that there is no contradiction.
Note: The variables that do not occur in the list of equations are undefined, so the answer cannot be determined for them.
*/
class Solution {

    /**
     * 399. Evaluate Division
     * @param String[][] $equations
     * @param Float[] $values
     * @param String[][] $queries
     * @return Float[]
     */
    private $graph = [];
    private $memo = [];
    function calcEquation($equations, $values, $queries) {
        $this->graph = [];
        $this->memo = [];

        for ($i = 0; $i < count($equations); $i++) {
            [$A, $B] = $equations[$i];
            $value = $values[$i];

            $this->graph[$A][$B] = $value;
            $this->graph[$B][$A] = 1.0 / $value;
        }
        
        $result = [];
        foreach ($queries as [$C, $D]) {
            if (!isset($this->graph[$C]) || !isset($this->graph[$D])) {
                $result[] = -1.0;
            } 
            elseif ($C === $D) {
                $result[] = 1.0;
            } 
            else {
                $result[] = $this->dfs($C, $D, []);
            }
        }

        return $result;       
    }
    
    private function dfs($C, $D, $visited) {
        $key = $C . "->" . $D;
        if (isset($this->memo[$key])) return $this->memo[$key];

        $visited[$C] = true;

        // Explore neighbors
        foreach ($this->graph[$C] as $neighbor => $value) {
            if ($neighbor === $D) {
                $this->memo[$key] = $value;
                return $value;
            }
            if (!isset($visited[$neighbor])) {
                $subResult = $this->dfs($neighbor, $D, $visited);
                if ($subResult !== -1.0) {
                    $this->memo[$key] = $value * $subResult;
                    return $this->memo[$key];
                }
            }
        }

        return -1.0;
    }    
}

$c = new Solution;
//print_r($c->calcEquation([["a","b"],["b","c"]], [2.0,3.0], [["a","c"],["b","a"],["a","e"],["a","a"],["x","x"]])); // Expect [6.00000,0.50000,-1.00000,1.00000,-1.00000]
//print_r($c->calcEquation([["a","b"]], [0.5], [["a","b"],["b","a"],["a","c"],["x","y"]])); // Expect [0.50000,2.00000,-1.00000,-1.00000]
//print_r($c->calcEquation([["a","b"],["b","c"],["bc","cd"]], [1.5,2.5,5.0], [["a","c"],["c","b"],["bc","cd"],["cd","bc"]])); // Expect [3.75000,0.40000,5.00000,0.20000]
print_r($c->calcEquation([["b","a"],["c","b"],["d","c"],["e","d"],["f","e"],["g","f"],["h","g"],["i","h"],["j","i"],["k","j"],["k","l"],["l","m"],["m","n"],["n","o"],["o","p"],["p","q"],["q","r"],["r","s"],["s","t"],["t","u"]], [1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05], [["a","u"]])); // Expect [1.00000]
?>