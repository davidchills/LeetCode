/*
Given an integer n, return the number of trailing zeroes in n!.
Note that n! = n * (n - 1) * (n - 2) * ... * 3 * 2 * 1.
    
172. Factorial Trailing Zeroes    
*/
class Solution {
    func trailingZeroes(_ n: Int) -> Int {
        var count = 0
        var current = n
        while current >= 5 {
            current /= 5
            count += current
        }
        return count
    }
}
let solution = Solution()
print(solution.trailingZeroes(3)) // Expect 0
print(solution.trailingZeroes(5))  // Expect 1
print(solution.trailingZeroes(0))  // Expect 0