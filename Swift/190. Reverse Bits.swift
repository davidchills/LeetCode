/*
Reverse bits of a given 32 bits unsigned integer.
Note:
Note that in some languages, such as Java, there is no unsigned integer type. 
In this case, both input and output will be given as a signed integer type. 
They should not affect your implementation, as the integer's internal binary representation is the same, whether it is signed or unsigned.
In Java, the compiler represents the signed integers using 2's complement notation. 
Therefore, in Example 2 above, the input represents the signed integer -3 and the output represents the signed integer -1073741825.
Constraints:
The input must be a binary string of length 32
    
190. Reverse Bits    
*/
class Solution {
    func reverseBits(_ n: Int) -> Int {
        var result: Int = 0
        var n = n
        for _ in 0..<32 {
            result = (result << 1) | (n & 1)
            n >>= 1
        }
        return result
    }
}
let solution = Solution()
print(solution.reverseBits(0b00000010100101000001111010011100)) // Expect 964176192
print(solution.reverseBits(0b11111111111111111111111111111101))  // Expect 3221225471