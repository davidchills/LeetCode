<?php
/*
A gene string can be represented by an 8-character long string, with choices from 'A', 'C', 'G', and 'T'.
Suppose we need to investigate a mutation from a gene string startGene to a gene string endGene 
    where one mutation is defined as one single character changed in the gene string.
For example, "AACCGGTT" --> "AACCGGTA" is one mutation.
There is also a gene bank bank that records all the valid gene mutations. 
    A gene must be in bank to make it a valid gene string.
Given the two gene strings startGene and endGene and the gene bank bank, 
    return the minimum number of mutations needed to mutate from startGene to endGene. 
    If there is no such a mutation, return -1.
Note that the starting point is assumed to be valid, so it might not be included in the bank.
*/
class Solution {

    /**
     * 433. Minimum Genetic Mutation
     * @param String $startGene
     * @param String $endGene
     * @param String[] $bank
     * @return Integer
     */
    function minMutation($startGene, $endGene, $bank) {
       if (!in_array($endGene, $bank)) { return -1; }

        $validGenes = ["A", "C", "G", "T"];
        $queue = [[$startGene, 0]];
        $visited = [$startGene => true];

        while (!empty($queue)) {
            [$currentGene, $mutations] = array_shift($queue);

            if ($currentGene === $endGene) {
                return $mutations;
            }

            for ($i = 0; $i < strlen($currentGene); $i++) {
                foreach ($validGenes as $char) {
                    if ($char !== $currentGene[$i]) {
                        $newGene = $currentGene;
                        $newGene[$i] = $char;
                        
                        if (in_array($newGene, $bank) && !isset($visited[$newGene])) {
                            $queue[] = [$newGene, $mutations + 1];
                            $visited[$newGene] = true;
                        }
                    }
                }
            }
        }

        return -1;        
    }
}

$c = new Solution;
print_r($c->minMutation("AACCGGTT", "AACCGGTA", ["AACCGGTA"])); // Expect 1
//print_r($c->minMutation("AACCGGTT", "AAACGGTA", ["AACCGGTA","AACCGCTA","AAACGGTA"])); // Expect 2
?>