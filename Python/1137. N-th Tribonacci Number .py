"""
The Tribonacci sequence Tn is defined as follows: 
T0 = 0, T1 = 1, T2 = 1, and Tn+3 = Tn + Tn+1 + Tn+2 for n >= 0.
Given n, return the value of Tn.
"""
# 1137. N-th Tribonacci Number
class Solution:
    def tribonacci(self, n: int) -> int:
        if n == 0:
            return 0
        if n < 3:
            return 1
        
        x = 0
        y = 1
        z = 1
        
        for i in range(3, n + 1):
            x, y, z = y, z, x + y + z
            
        return z
    
# Test Code
solution = Solution()
#print(solution.tribonacci(4)) # Expect 4
print(solution.tribonacci(25)) # Expect 1389537