"""
You are given two arrays of integers, fruits and baskets, each of length n, 
    where fruits[i] represents the quantity of the ith type of fruit, and baskets[j] represents the capacity of the jth basket.
From left to right, place the fruits according to these rules:
Each fruit type must be placed in the leftmost available basket with a capacity greater than or equal to the quantity of that fruit type.
Each basket can hold only one type of fruit.
If a fruit type cannot be placed in any basket, it remains unplaced.
Return the number of fruit types that remain unplaced after all possible allocations are made.
"""
# 3477. Fruits Into Baskets II
from typing import List
class Solution:
    def numOfUnplacedFruits(self, fruits: List[int], baskets: List[int]) -> int:
        unplaced = 0
        for i in fruits:
            for j in baskets:
                if i <= j:
                    baskets.remove(j)
                    break
            else:
                unplaced += 1
        return unplaced       

    
# Test Code
solution = Solution()
print(solution.numOfUnplacedFruits([4,2,5], [3,5,4])) # Expect 1
print(solution.numOfUnplacedFruits([3,6,1], [6,4,7])) # Expect 0

