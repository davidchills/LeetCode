/*
You are given positive integers n and m.
Define two integers as follows:
num1: The sum of all integers in the range [1, n] (both inclusive) that are not divisible by m.
num2: The sum of all integers in the range [1, n] (both inclusive) that are divisible by m.
Return the integer num1 - num2.
    
2894. Divisible and Non-divisible Sums Difference    
*/
class Solution {
    func differenceOfSums(_ n: Int, _ m: Int) -> Int {
        let total = n * (n + 1) / 2
        let k = n / m
        let sumDiv = m * k * (k + 1) / 2
        let sumNonDiv = total - sumDiv
        return sumNonDiv - sumDiv
    }
}
let solution = Solution()
print(solution.differenceOfSums(10, 3)) // Expect 19
print(solution.differenceOfSums(5, 6)) // Expect 15
print(solution.differenceOfSums(5, 1)) // Expect -15
