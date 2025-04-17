/*
You are a professional robber planning to rob houses along a street. 
Each house has a certain amount of money stashed, 
the only constraint stopping you from robbing each of them is that adjacent houses have security systems connected and 
it will automatically contact the police if two adjacent houses were broken into on the same night.
Given an integer array nums representing the amount of money of each house, 
return the maximum amount of money you can rob tonight without alerting the police.
    
198. House Robber    
*/
class Solution {
    func rob(_ nums: [Int]) -> Int {
        guard !nums.isEmpty else { return 0 }
        var previous1 = 0
        var previous2 = 0
        for loot in nums {
            let current = max(previous1, previous2 + loot)
            previous2 = previous1
            previous1 = current
        }
        return previous1
    }
}
let solution = Solution()
print(solution.rob([1,2,3,1])) // Expect 4
print(solution.rob([2,7,9,3,1]))  // Expect 12