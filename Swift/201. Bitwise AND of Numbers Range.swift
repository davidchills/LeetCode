/*
Given two integers left and right that represent the range [left, right], return the bitwise AND of all numbers in this range, inclusive.
Brian Kernighan's Algorithm
    
201. Bitwise AND of Numbers Range    
*/
class Solution {
    func rangeBitwiseAnd(_ left: Int, _ right: Int) -> Int {
        var right = right
        while right > left {
            right = right & (right - 1)
        }
        return right
    }
}
let solution = Solution()
print(solution.rangeBitwiseAnd(5, 7)) // Expect 4
print(solution.rangeBitwiseAnd(0, 0))  // Expect 0
print(solution.rangeBitwiseAnd(1, 2147483647))  // Expect 0