"""
You are given two arrays of integers, fruits and baskets, each of length n, 
    where fruits[i] represents the quantity of the ith type of fruit, and baskets[j] represents the capacity of the jth basket.
From left to right, place the fruits according to these rules:
Each fruit type must be placed in the leftmost available basket with a capacity greater than or equal to the quantity of that fruit type.
Each basket can hold only one type of fruit.
If a fruit type cannot be placed in any basket, it remains unplaced.
Return the number of fruit types that remain unplaced after all possible allocations are made.
"""
# 3479. Fruits Into Baskets III
from typing import List
class Solution:
    def numOfUnplacedFruits(self, fruits: List[int], baskets: List[int]) -> int:
        if not fruits or not baskets:
            return -1

        n = len(fruits)
        if n != len(baskets):
            return -2

        tree = [0] * (4 * n)
        self.buildTree(tree, baskets, 0, 0, n - 1)
        count = 0

        for fruit in fruits:
            if not self.placeFruit(tree, 0, 0, n - 1, fruit):
                count += 1

        return count

    def buildTree(self, tree: List[int], baskets: List[int], i: int, low: int, high: int):
        if low == high:
            tree[i] = baskets[low]
            return

        mid = (low + high) >> 1
        left = 2 * i + 1
        right = left + 1

        self.buildTree(tree, baskets, left, low, mid)
        self.buildTree(tree, baskets, right, mid + 1, high)

        tree[i] = max(tree[left], tree[right])

    def placeFruit(self, tree: List[int], i: int, low: int, high: int, value: int) -> bool:
        if tree[i] < value:
            return False

        if low == high:
            tree[i] = 0
            return True

        mid = (low + high) >> 1
        left = (i << 1) + 1
        right = left + 1

        if tree[left] >= value:
            found = self.placeFruit(tree, left, low, mid, value)
        else:
            found = self.placeFruit(tree, right, mid + 1, high, value)

        tree[i] = max(tree[left], tree[right])
        return found       

    
# Test Code
solution = Solution()
print(solution.numOfUnplacedFruits([4,2,5], [3,5,4])) # Expect 1
print(solution.numOfUnplacedFruits([3,6,1], [6,4,7])) # Expect 0
