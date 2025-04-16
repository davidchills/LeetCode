"""
You are given two positive integer arrays spells and potions, of length n and m respectively, 
where spells[i] represents the strength of the ith spell and potions[j] represents the strength of the jth potion.
You are also given an integer success. A spell and potion pair is considered successful if the product of their strengths is at least success.
Return an integer array pairs of length n where pairs[i] is the number of potions that will form a successful pair with the ith spell.
"""
# 2300. Successful Pairs of Spells and Potions
from typing import List
import bisect
class Solution:
    def successfulPairs(self, spells: List[int], potions: List[int], success: int) -> List[int]:
        potions.sort()
        n = len(potions)
        pairs = []
        for spell in spells:
            minPower = (success + spell - 1) // spell
            index = bisect.bisect_left(potions, minPower)
            pairs.append(n - index)      
        
        return pairs
    
# Test Code
solution = Solution()
print(solution.successfulPairs([5,1,3], [1,2,3,4,5], 7)) # Expect [4,0,3]
print(solution.successfulPairs([3,1,2], [8,5,8], 16)) # Expect [2,0,2]