/*
Given an integer array nums, return true if you can partition the array into two subsets 
    such that the sum of the elements in both subsets is equal or false otherwise.
    
416. Partition Equal Subset Sum    
*/
class Solution {
    func canPartition(_ nums: [Int]) -> Bool {
        let arraySum = nums.reduce(0, +)
        if arraySum % 2 != 0 { return false }
        let target = arraySum / 2
        var dp = Array(repeating: false, count: target + 1)
        dp[0] = true
        
        for num in nums {
            for i in stride(from: target, through: num, by: -1) {
                dp[i] = dp[i] || dp[i - num]
                if dp[target] { break }
            }
        }
        return dp[target]
    }
}
let solution = Solution()
print(solution.canPartition([1,5,11,5])) // Expect true
print(solution.canPartition([1,2,3,5]))  // Expect false