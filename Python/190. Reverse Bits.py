"""
Reverse bits of a given 32 bits unsigned integer.
Note:
Note that in some languages, such as Java, there is no unsigned integer type. 
In this case, both input and output will be given as a signed integer type. 
They should not affect your implementation, as the integer's internal binary representation is the same, whether it is signed or unsigned.
In Java, the compiler represents the signed integers using 2's complement notation. 
Therefore, in Example 2 above, the input represents the signed integer -3 and the output represents the signed integer -1073741825.
Constraints:
The input must be a binary string of length 32
"""
# 190. Reverse Bits
from typing import List
class Solution:
    def reverseBits(self, n: int) -> int:
        result = 0
        for _ in range(32):
            result = (result << 1) | (n & 1)
            n >>= 1
        return result
    
# Test Code
solution = Solution()
print(solution.reverseBits(int("00000010100101000001111010011100", 2))) # Expect 964176192
print(solution.reverseBits(int("11111111111111111111111111111101", 2))) # Expect 3221225471
