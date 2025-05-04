"""
Given a list of dominoes, dominoes[i] = [a, b] is equivalent to dominoes[j] = [c, d] 
if and only if either (a == c and b == d), or (a == d and b == c) - that is, one domino can be rotated to be equal to another domino.
Return the number of pairs (i, j) for which 0 <= i < j < dominoes.length, and dominoes[i] is equivalent to dominoes[j].
"""
# 1128. Number of Equivalent Domino Pairs
from typing import List
from collections import defaultdict
class Solution:
    def numEquivDominoPairs(self, dominoes: List[List[int]]) -> int:
        seen = defaultdict(int)
        pairs = 0
        for i, j in dominoes:
            key = i * 10 + j if i <= j else j * 10 + i
            if key in seen:
                pairs += seen[key]
                seen[key] += 1
            else:
                seen[key] = 1
                
        return pairs
        
    
# Test Code
solution = Solution()
print(solution.numEquivDominoPairs([[1,2],[2,1],[3,4],[5,6]])) # Expect 1
print(solution.numEquivDominoPairs([[1,2],[1,2],[1,1],[1,2],[2,2]])) # Expect 3
