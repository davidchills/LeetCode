"""
There exists an undirected tree with n nodes numbered 0 to n - 1. 
You are given a 0-indexed 2D integer array edges of length n - 1, 
    where edges[i] = [ui, vi] indicates that there is an edge between nodes ui and vi in the tree. You are also given a positive integer k, 
    and a 0-indexed array of non-negative integers nums of length n, where nums[i] represents the value of the node numbered i.
Alice wants the sum of values of tree nodes to be maximum, 
    for which Alice can perform the following operation any number of times (including zero) on the tree:
Choose any edge [u, v] connecting the nodes u and v, and update their values as follows:
nums[u] = nums[u] XOR k
nums[v] = nums[v] XOR k
Return the maximum possible sum of the values Alice can achieve by performing the operation any number of times.
"""
# 3068. Find the Maximum Sum of Node Values
from typing import List
class Solution:
    def maximumValueSum(self, nums: List[int], k: int, edges: List[List[int]]) -> int:
        total = sum(nums)
        gains = [(num ^ k) - num for num in nums]        
        pos = [g for g in gains if g > 0]
        nonPos = [g for g in gains if g <= 0]
        posSum = sum(pos)
        p = len(pos)
        
        if p % 2 == 0:
            bestGain = posSum
        else:
            smallestPos = min(pos) if pos else float('inf')
            largestNonPos = max(nonPos) if nonPos else float('-inf')
            opt1 = posSum - smallestPos
            opt2 = posSum + largestNonPos
            bestGain = max(opt1, opt2)
        
        return total + bestGain        
        
    
# Test Code
solution = Solution()
print(solution.maximumValueSum([1,2,1], 3, [[0,1],[0,2]])) # Expect 6
print(solution.maximumValueSum([2,3], 7, [[0,1]])) # Expect 9
print(solution.maximumValueSum([7,7,7,7,7,7], 3, [[0,1],[0,2],[0,3],[0,4],[0,5]])) # Expect 42
