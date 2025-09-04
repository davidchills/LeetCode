"""
You are given three integers x, y, and z, representing the positions of three people on a number line:
x is the position of Person 1.
y is the position of Person 2.
z is the position of Person 3, who does not move.
Both Person 1 and Person 2 move toward Person 3 at the same speed.
Determine which person reaches Person 3 first:
Return 1 if Person 1 arrives first.
Return 2 if Person 2 arrives first.
Return 0 if both arrive at the same time.
Return the result accordingly.
"""
# 3516. Find Closest Person
import time
from typing import List
class Solution:
    def findClosest(self, x: int, y: int, z: int) -> int:
        dist1 = abs(z - x)
        dist2 = abs(z - y)
        if dist1 < dist2:
            return 1
        elif dist2 < dist1:
            return 2
        else:
            return 0

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.findClosest(2, 7, 4)) # Expect 1
print(solution.findClosest(2, 5, 6)) # Expect 2
print(solution.findClosest(1, 5, 3)) # Expect 0

end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")