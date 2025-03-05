"""
There is a biker going on a road trip. The road trip consists of n + 1 points at different altitudes. 
    The biker starts his trip on point 0 with altitude equal 0.
You are given an integer array gain of length n where gain[i] is the net gain in altitude between points i​​​​​​ and i + 1 for all (0 <= i < n). 
    Return the highest altitude of a point.
"""
# 1732. Find the Highest Altitude
from itertools import accumulate
class Solution:
    def largestAltitude(self, gain: list[int]) -> int:
        return max(accumulate([0] + gain))
            
    
# Test Code
solution = Solution()
#print(solution.largestAltitude([-5,1,5,0,-7])) # Expect 1
print(solution.largestAltitude([-4,-3,-2,-1,4,3,2])) # Expect 0