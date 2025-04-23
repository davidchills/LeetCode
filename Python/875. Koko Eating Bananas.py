"""
Koko loves to eat bananas. There are n piles of bananas, the ith pile has piles[i] bananas. The guards have gone and will come back in h hours.
Koko can decide her bananas-per-hour eating speed of k. Each hour, she chooses some pile of bananas and eats k bananas from that pile. 
If the pile has less than k bananas, she eats all of them instead and will not eat any more bananas during this hour.
Koko likes to eat slowly but still wants to finish eating all the bananas before the guards return.
Return the minimum integer k such that she can eat all the bananas within h hours.
"""
# 875. Koko Eating Bananas
from typing import List
class Solution:
    def minEatingSpeed(self, piles: List[int], h: int) -> int:
        def canFinish(speed: int) -> bool:
            hours = 0
            for pile in piles:
                hours += (pile + speed - 1) // speed
                if hours > h:
                    return False
            return hours <= h

        left = 1
        right = max(piles)
        result = right
        
        while left <= right:
            mid = (left + right) // 2
            if canFinish(mid):
                result = mid
                right = mid - 1
            else:
                left = mid + 1
        
        return result        
        
    
# Test Code
solution = Solution()
print(solution.minEatingSpeed([3,6,7,11], 8)) # Expect 4
print(solution.minEatingSpeed([30,11,23,4,20], 5)) # Expect 30
print(solution.minEatingSpeed([30,11,23,4,20], 6)) # Expect 23