"""
No-Zero integer is a positive integer that does not contain any 0 in its decimal representation.
Given an integer n, return a list of two integers [a, b] where:
a and b are No-Zero integers.
a + b = n
The test cases are generated so that there is at least one valid solution. If there are many valid solutions, you can return any of them.
"""
# 1317. Convert Integer to the Sum of Two No-Zero Integers
import time
from typing import List
class Solution:
    def getNoZeroIntegers(self, n: int) -> List[int]:
        def has_zero(num: int) -> bool:
            while num > 0:
                if num % 10 == 0:
                    return True
                num //= 10
            return False
        
        for a in range(1, n):
            b = n - a
            if not has_zero(a) and not has_zero(b):
                return [a, b]
        return []

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.getNoZeroIntegers(2)) # Expect [1,1]
print(solution.getNoZeroIntegers(11)) # Expect [2,9]


end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")