"""
You are given two integer arrays nums1 and nums2. You are tasked to implement a data structure that supports queries of two types:
1. Add a positive integer to an element of a given index in the array nums2.
2. Count the number of pairs (i, j) such that nums1[i] + nums2[j] equals a given value (0 <= i < nums1.length and 0 <= j < nums2.length).
Implement the FindSumPairs class:
FindSumPairs(int[] nums1, int[] nums2) Initializes the FindSumPairs object with two integer arrays nums1 and nums2.
• void add(int index, int val) Adds val to nums2[index], i.e., apply nums2[index] += val.
• int count(int tot) Returns the number of pairs (i, j) such that nums1[i] + nums2[j] == tot.
"""
# 1865. Finding Pairs With a Certain Sum
from typing import List
class FindSumPairs:

    def __init__(self, nums1: List[int], nums2: List[int]):
        self.nums1 = nums1
        self.nums2 = nums2
        self.nums2_count = Counter(nums2)        

    def add(self, index: int, val: int) -> None:
        self.nums2_count[self.nums2[index]] -= 1
        if self.nums2_count[self.nums2[index]] <= 0:
            self.nums2_count.pop(self.nums2[index])

        self.nums2[index] += val
        self.nums2_count[self.nums2[index]] += 1        

    def count(self, tot: int) -> int:
        count = 0
        for val in self.nums1:
            count += self.nums2_count[tot - val]
        return count       

    
# Test Code
# Your FindSumPairs object will be instantiated and called as such:
# obj = FindSumPairs(nums1, nums2)
# obj.add(index,val)
# param_2 = obj.count(tot)
