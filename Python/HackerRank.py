"""
Description
"""
# 506. Relative Ranks
from typing import List
class Solution:
    def isWeird(self, n):
        n = int(n.strip())
        if n % 2 != 0:
            print("Weird")
        elif n <= 5:
            print("Not Weird")
        elif n <= 20:
            print("Weird")
        else:
            print("Not Weird")
    
# Test Code
solution = Solution()
solution.isWeird("18")