"""
You are visiting a farm that has a single row of fruit trees arranged from left to right. 
The trees are represented by an integer array fruits where fruits[i] is the type of fruit the ith tree produces.
You want to collect as much fruit as possible. However, the owner has some strict rules that you must follow:
You only have two baskets, and each basket can only hold a single type of fruit. There is no limit on the amount of fruit each basket can hold.
Starting from any tree of your choice, you must pick exactly one fruit from every tree (including the start tree) while moving to the right. 
The picked fruits must fit in one of your baskets.
Once you reach a tree with fruit that cannot fit in your baskets, you must stop.
Given the integer array fruits, return the maximum number of fruits you can pick.
"""
# 904. Fruit Into Baskets
from typing import List
class Solution:
    def totalFruit(self, fruits: List[int]) -> int:
        cnt = {}
        left = 0
        best = 0
        for right, f in enumerate(fruits):
            cnt[f] = cnt.get(f, 0) + 1
            # shrink until we have at most 2 types
            while len(cnt) > 2:
                cnt[fruits[left]] -= 1
                if cnt[fruits[left]] == 0:
                    del cnt[fruits[left]]
                left += 1
            best = max(best, right - left + 1)
        return best       

    
# Test Code
solution = Solution()
print(solution.totalFruit([1,2,1])) # Expect 3
print(solution.totalFruit([0,1,2,2])) # Expect 3
print(solution.totalFruit([1,2,3,2,2])) # Expect 4

