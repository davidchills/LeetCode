/*
Given a set of distinct positive integers nums, 
    return the largest subset answer such that every pair (answer[i], answer[j]) of elements in this subset satisfies:
answer[i] % answer[j] == 0, or
answer[j] % answer[i] == 0
If there are multiple solutions, return any of them.
    
368. Largest Divisible Subset    
*/
class Solution {
    func largestDivisibleSubset(_ nums: [Int]) -> [Int] {
        let n = nums.count
        if n == 0 { return [] }
        var subset = [Int]()
        var dp = Array(repeating: 1, count: n)
        var prev = Array(repeating: -1, count: n)
        var maxIndex = 0
        let sortedNums = nums.sorted()
        for i in 0..<n {
            for j in 0..<i {
                if sortedNums[i] % sortedNums[j] == 0 && dp[j] + 1 > dp[i] {
                    dp[i] = dp[j] + 1
                    prev[i] = j
                }
            }
            if dp[i] > dp[maxIndex] {
                maxIndex = i
            }
        }
        var i = maxIndex
        while i >= 0 {
            subset.append(sortedNums[i])
            i = prev[i]
        }
        subset.reverse()
        return subset
    }
}
let solution = Solution()
print(solution.largestDivisibleSubset([1,2,3])) // Expect [1,2] or [1,3]
print(solution.largestDivisibleSubset([1,2,4,8]))  // Expect [1,2,4,8]