"""
You are given a 2D array queries, where queries[i] is of the form [l, r]. 
Each queries[i] defines an array of integers nums consisting of elements ranging from l to r, both inclusive.
In one operation, you can:
Select two integers a and b from the array.
Replace them with floor(a / 4) and floor(b / 4).
Your task is to determine the minimum number of operations required to reduce all elements of the array to zero for each query. 
Return the sum of the results for all queries.
"""
# 3495. Minimum Operations to Make Array Elements Zero
import time
from typing import List
import math
class Solution:
    def minOperations(self, queries: List[List[int]]) -> int:
        def required(n):
            if n == 0:
                return 0
            x = int(math.log(n, 4)) 
            total = ((4 ** x) * (3 * x - 1)  + 1)/3
            total += (n - 4 ** x + 1) * (x + 1)
            return int(total)

        count = 0
        for l, r in queries: 
            count += (required(r) - required(l - 1) + 1) // 2
        return count

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.minOperations([[1,2],[2,4]])) # Expect 3
print(solution.minOperations([[2,6]])) # Expect 4

end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")