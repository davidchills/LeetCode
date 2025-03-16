"""
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
"""
# 433. Minimum Genetic Mutation
from typing import List
from collections import deque
class Solution:
    def minMutation(self, startGene: str, endGene: str, bank: List[str]) -> int:
        if endGene not in bank:
            return -1
        
        validGenes = ["A","C","G","T"]
        queue = deque([(startGene, 0)])
        visited = set()
        visited.add(startGene)
        
        while queue:
            currentGene, mutations = queue.popleft()
            
            if currentGene == endGene:
                return mutations
            
            for i in range(len(currentGene)):
                for char in validGenes:
                    if char != currentGene[i]:
                        newGene = currentGene[:i] + char + currentGene[i+1:]

                        if newGene in bank and newGene not in visited:
                            queue.append((newGene, mutations + 1))
                            visited.add(newGene)
                            
        return -1

    
# Test Code
solution = Solution()
print(solution.minMutation("AACCGGTT", "AACCGGTA", ["AACCGGTA"])) # Expect 1
print(solution.minMutation("AACCGGTT", "AAACGGTA", ["AACCGGTA","AACCGCTA","AAACGGTA"])) # Expect 2
