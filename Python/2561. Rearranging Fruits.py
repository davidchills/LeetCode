"""
You have two fruit baskets containing n fruits each. 
You are given two 0-indexed integer arrays basket1 and basket2 representing the cost of fruit in each basket. 
You want to make both baskets equal. To do so, you can use the following operation as many times as you want:
Chose two indices i and j, and swap the ith fruit of basket1 with the jth fruit of basket2.
The cost of the swap is min(basket1[i],basket2[j]).
Two baskets are considered equal if sorting them according to the fruit cost makes them exactly the same baskets.
Return the minimum cost to make both the baskets equal or -1 if impossible.
"""
# 2561. Rearranging Fruits
from typing import List
from collections import Counter
class Solution:
    def minCost(self, basket1: List[int], basket2: List[int]) -> int:
        b1 = dict(Counter(basket1))
        b2 = dict(Counter(basket2))
        
        tot = Counter(basket1 + basket2)
        
        c1 = []
        c2 = []
        for k, v in tot.items():
            if v % 2 != 0:
                return -1
            b1c = b1.get(k, 0)
            b2c = b2.get(k, 0)
            if b1c == b2c:
                continue
            if b1c > b2c:
                for i in range((b1c - b2c) // 2):
                    c1.append(k)
            else:
                for i in range((b2c - b1c) // 2):
                    c2.append(k)
        c1 = sorted(c1)
        c2 = sorted(c2, reverse=True)
        ans = 0
        min_v = min(basket1 + basket2)
        for v1,v2 in zip(c1,c2):
            ans += min(v1,v2, min_v*2)
        return ans      

    
# Test Code
solution = Solution()
print(solution.minCost([4,2,2,2], [1,4,1,2])) # Expect 1
print(solution.minCost([2,3,4,1], [3,2,5,1])) # Expect -1
