"""
Given 3 positives numbers a, b and c. Return the minimum flips required in some bits of a and b to make ( a OR b == c ). (bitwise OR operation).
Flip operation consists of change any single bit 1 to 0 or change the bit 0 to 1 in their binary representation
"""
# 1318. Minimum Flips to Make a OR b Equal to c
class Solution:
    def minFlips(self, a: int, b: int, c: int) -> int:
        flips = 0
        while a or b or c:
            abit = a & 1
            bbit = b & 1
            cbit = c & 1
            
            if cbit == 1:
                if abit == 0 and bbit == 0:
                    flips += 1
            else:
                flips += (abit + bbit)
            
            a >>= 1
            b >>= 1
            c >>= 1
        
        return flips        
        
    
# Test Code
solution = Solution()
print(solution.minFlips(2, 6, 5)) # Expect 3
print(solution.minFlips(4, 2, 7)) # Expect 1
print(solution.minFlips(1, 2, 3)) # Expect 0