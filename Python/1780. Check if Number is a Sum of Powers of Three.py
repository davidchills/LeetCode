"""
Given an integer n, return true if it is possible to represent n as the sum of distinct powers of three. Otherwise, return false.
An integer y is a power of three if there exists an integer x such that y == 3x.
"""
# 1780. Check if Number is a Sum of Powers of Three
class Solution:
    def checkPowersOfThree(self, n: int) -> bool:
        while n > 0:
            if n % 3 > 1:
                return False
            n = n // 3
        return True
        
# Test Code
solution = Solution()
print(solution.checkPowersOfThree(12))
#print(solution.checkPowersOfThree(91))
#print(solution.checkPowersOfThree(21))