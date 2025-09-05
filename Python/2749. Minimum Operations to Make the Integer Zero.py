"""
You are given two integers num1 and num2.
In one operation, you can choose integer i in the range [0, 60] and subtract 2i + num2 from num1.
Return the integer denoting the minimum number of operations needed to make num1 equal to 0.
If it is impossible to make num1 equal to 0, return -1.
"""
# 2749. Minimum Operations to Make the Integer Zero
import time
class Solution:
    def makeTheIntegerZero(self, num1: int, num2: int) -> int:
        for k in range(1, 61):
            x = num1 - num2 * k
            if x < k:
                return -1
            if k >= x.bit_count():
                return k
        return -1

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.makeTheIntegerZero(3, -2)) # Expect 3
print(solution.makeTheIntegerZero(5, 7)) # Expect -1

end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")