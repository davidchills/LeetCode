"""
You are given an integer array ranks representing the ranks of some mechanics. 
    ranksi is the rank of the ith mechanic. A mechanic with a rank r can repair n cars in r * n2 minutes.
You are also given an integer cars representing the total number of cars waiting in the garage to be repaired.
Return the minimum time taken to repair all the cars.
Note: All the mechanics can repair the cars simultaneously.
"""
# 2594. Minimum Time to Repair Cars
from typing import List
import math
class Solution:
    def repairCars(self, ranks: List[int], cars: int) -> int:
        left = 1
        right = min(ranks) * cars * cars
        result = right
        
        while left <= right:
            mid = (left + right) // 2
            if self.canRepairAllCars(ranks, cars, mid):
                result = mid
                right = mid - 1
            else:
                left = mid + 1
                
        return result
    
    def canRepairAllCars(self, ranks, cars, timeLimit):
        totalCars = 0
        for rank in ranks:
            maxCars = math.floor(math.sqrt(timeLimit / rank))
            totalCars += maxCars
            if totalCars >= cars:
                return True
            
        return False
    
# Test Code
solution = Solution()
print(solution.repairCars([4,2,3,1], 10)) # Expect 16
print(solution.repairCars([5,1,8], 6)) # Expect 16