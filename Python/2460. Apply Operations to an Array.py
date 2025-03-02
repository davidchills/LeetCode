"""
You are given a 0-indexed array nums of size n consisting of non-negative integers.
You need to apply n - 1 operations to this array where, in the ith operation (0-indexed), 
    you will apply the following on the ith element of nums:
If nums[i] == nums[i + 1], then multiply nums[i] by 2 and set nums[i + 1] to 0. Otherwise, you skip this operation.
After performing all the operations, shift all the 0's to the end of the array.
For example, the array [1,0,2,0,0,1] after shifting all its 0's to the end, is [1,2,1,0,0,0].
Return the resulting array.
Note that the operations are applied sequentially, not all at once.
"""
# 2460. Apply Operations to an Array
class Solution:
    def applyOperations(self, nums: list[int]) -> list[int]:
        n = len(nums)
        if n < 2:
            return nums
        
        for i in range(1, n):
            if nums[i - 1] == nums[i]:
                nums[i - 1] *= 2
                nums[i] = 0
        
        nonZeroIndex = 0;
        for i in range(0, n):
            if nums[i] != 0:
                nums[nonZeroIndex] = nums[i]
                nonZeroIndex += 1
                
        while nonZeroIndex < n:
            nums[nonZeroIndex] = 0
            nonZeroIndex += 1
            
        return nums
        
    
# Test Code
solution = Solution()
#print(solution.applyOperations([1,2,2,1,1,0])) # Expect [1,4,2,0,0,0]
print(solution.applyOperations([0,1])) # Expect [1,0]