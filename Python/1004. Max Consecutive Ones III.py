"""
Given a binary array nums and an integer k, return the maximum number of consecutive 1's in the array if you can flip at most k 0's.
"""
# 1004. Max Consecutive Ones III
class Solution:
    def longestOnes(self, nums: list[int], k: int) -> int:
        n = len(nums)
        left = 0
        zeroCount = 0
        maxLength = 0
        
        for right in range(0, n):
            if nums[right] == 0:
                zeroCount += 1
                
            while zeroCount > k:
                if nums[left] == 0:
                    zeroCount -= 1
                left += 1
                
            maxLength = max(maxLength, right - left + 1)
            
        return maxLength

    
# Test Code
solution = Solution()
#print(solution.longestOnes([1,1,1,0,0,0,1,1,1,1,0], 2)) # Expect 6
print(solution.longestOnes([0,0,1,1,0,0,1,1,1,0,1,1,0,0,0,1,1,1,1], 3)) # Expect 10
