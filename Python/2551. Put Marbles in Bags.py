"""
You have k bags. You are given a 0-indexed integer array weights where weights[i] is the weight of the ith marble. 
    You are also given the integer k.
Divide the marbles into the k bags according to the following rules:
No bag is empty.
If the ith marble and jth marble are in a bag, then all marbles with an index between the ith and jth indices should also be in that same bag.
If a bag consists of all the marbles with an index from i to j inclusively, then the cost of the bag is weights[i] + weights[j].
The score after distributing the marbles is the sum of the costs of all the k bags.
Return the difference between the maximum and minimum scores among marble distributions.
"""
# 2551. Put Marbles in Bags
from typing import List
class Solution:
    def putMarbles(self, weights: List[int], k: int) -> int:
        n = len(weights)
        if k == 1:
            return 0
        
        diffs = []
        for i in range(n - 1):
            diffs.append(weights[i] + weights[i + 1])
        
        diffs.sort()
        
        return sum(diffs[-(k - 1):]) - sum(diffs[:k - 1])
        
    
# Test Code
solution = Solution()
print(solution.putMarbles([1,3,5,1], 2)) # Expect 4
print(solution.putMarbles([1, 3], 2)) # Expect 0