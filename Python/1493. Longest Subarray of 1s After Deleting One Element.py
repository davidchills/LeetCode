"""
Given a binary array nums, you should delete one element from it.
Return the size of the longest non-empty subarray containing only 1's in the resulting array. Return 0 if there is no such subarray.
"""
# 1493. Longest Subarray of 1s After Deleting One Element
class Solution:
    def longestSubarray(self, nums: list[int]) -> int:
        n = len(nums)
        left = 0
        zeroCount = 0
        maxLength = 0
        
        for right in range(0, n):
            if nums[right] == 0:
                zeroCount += 1
                
            while zeroCount > 1:
                if nums[left] == 0:
                    zeroCount -= 1
                left += 1
                
            maxLength = max(maxLength, right - left)
            
        return maxLength

    
# Test Code
solution = Solution()
#print(solution.longestSubarray([1,1,0,1])) # Expect 3
#print(solution.longestSubarray([0,1,1,1,0,1,1,0,1])) # Expect 5
print(solution.longestSubarray([1,1,1])) # Expect 2
