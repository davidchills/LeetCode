"""
Given an integer n, return any array containing n unique integers such that they add up to 0.
"""
# 1304. Find N Unique Integers Sum up to Zero
import time
from typing import List
class Solution:
    def sumZero(self, n: int) -> List[int]:
        return [ n * (1 - n) // 2] + list(range(1, n))
    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.sumZero(5)) # Expect [-7,-1,1,3,4] or [-5,-1,1,2,3] or [-3,-1,2,-2,4]
print(solution.sumZero(3)) # Expect [-1,0,1]
print(solution.sumZero(1)) # Expect [0]

end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")