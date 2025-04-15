"""
You are given two 0-indexed arrays nums1 and nums2 of length n, both of which are permutations of [0, 1, ..., n - 1].
A good triplet is a set of 3 distinct values which are present in increasing order by position both in nums1 and nums2. 
In other words, if we consider pos1v as the index of the value v in nums1 and pos2v as the index of the value v in nums2, 
then a good triplet will be a set (x, y, z) where 0 <= x, y, z <= n - 1, such that pos1x < pos1y < pos1z and pos2x < pos2y < pos2z.
"""
# 2179. Count Good Triplets in an Array
from typing import List
import bisect

class BIT:
    """Binary Indexed Tree for range sum query"""
    def __init__(self, size):
        self.tree = [0] * (size + 2)

    def update(self, index, value):
        index += 1
        while index < len(self.tree):
            self.tree[index] += value
            index += index & -index

    def query(self, index):
        index += 1
        result = 0
        while index > 0:
            result += self.tree[index]
            index -= index & -index
        return result
    
    
class Solution:
    def goodTriplets(self, nums1: List[int], nums2: List[int]) -> int:
        n = len(nums1)
        pos2 = {num: i for i, num in enumerate(nums2)}
        nums = [pos2[x] for x in nums1]

        leftBIT = BIT(n)
        rightBIT = BIT(n)

        leftCount = [0] * n
        rightCount = [0] * n

        # Count how many elements on the left are smaller
        for i in range(n):
            leftCount[i] = leftBIT.query(nums[i] - 1)
            leftBIT.update(nums[i], 1)

        # Count how many elements on the right are greater
        for i in range(n - 1, -1, -1):
            rightCount[i] = rightBIT.query(n - 1) - rightBIT.query(nums[i])
            rightBIT.update(nums[i], 1)

        # Compute number of good triplets
        total = 0
        for i in range(n):
            total += leftCount[i] * rightCount[i]

        return total        
    
# Test Code
solution = Solution()
print(solution.goodTriplets([2,0,1,3], [0,1,2,3])) # Expect 1
print(solution.goodTriplets([4,0,1,3,2], [4,1,0,2,3])) # Expect 4