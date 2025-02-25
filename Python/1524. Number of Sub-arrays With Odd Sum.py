"""
Given an array of integers arr, return the number of subarrays with an odd sum.

Since the answer can be very large, return it modulo 10^9 + 7.
"""
# 1524. Number of Sub-arrays With Odd Sum
class Solution(object):
    def numOfSubarrays(self, arr: list[int]) -> int:
        
        mod = 10**9+7
        oddCount = 0
        evenCount = 1
        prefixSum = 0
        result = 0
        
        for num in arr:
            prefixSum += num
            if prefixSum % 2 == 1:
                result = (result + evenCount) % mod
                oddCount += 1
            else:
                result = (result + oddCount) % mod
                evenCount += 1
                
        return result

    
# Test Code
solution = Solution()

#arr = [1,3,5] # Expect 4
#arr = [2,4,6] # Expect 0
arr = [1,2,3,4,5,6,7] # Expect 15
print(solution.numOfSubarrays(arr))