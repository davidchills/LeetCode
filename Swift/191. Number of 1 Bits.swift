/*
Given a positive integer n, write a function that returns the number of set bits in its binary representation 
(also known as the Hamming weight).
    
191. Number of 1 Bits    
*/
class Solution {
    func hammingWeight(_ n: Int) -> Int {
        var n = n
        var weight = 0
        while n != 0 {
            n &= n - 1
            weight += 1
        }
        return weight
    }
}
let solution = Solution()
print(solution.hammingWeight(11)) // Expect 3
print(solution.hammingWeight(128))  // Expect 1
print(solution.hammingWeight(2147483645))  // Expect 30