"""
Given a zero-based permutation nums (0-indexed), build an array ans of the same length where 
    ans[i] = nums[nums[i]] for each 0 <= i < nums.length and return it.
A zero-based permutation nums is an array of distinct integers from 0 to nums.length - 1 (inclusive).
Follow-up: Can you solve it without using an extra space (i.e., O(1) memory)?
"""
# 1920. Build Array from Permutation
class Solution(object):
    def buildArray(self, nums: list[int]) -> list[int]:

        n = len(nums)
        
        for i in range(n):
            nums[i] += n * (nums[nums[i]] % n)
            
        for i in range(n):
            nums[i] = int(nums[i] / n)
        
        return nums
    
# Test Code
solution = Solution()
print(solution.buildArray([0,2,1,5,3,4])) # Expect [0,1,2,4,5,3]
print(solution.buildArray([5,0,1,2,3,4])) # Expect [4,5,0,1,2,3]