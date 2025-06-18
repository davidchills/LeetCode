/*
Given a 0-indexed integer array nums of size n, 
find the maximum difference between nums[i] and nums[j] (i.e., nums[j] - nums[i]), such that 0 <= i < j < n and nums[i] < nums[j].
Return the maximum difference. If no such i and j exists, return -1.
    
2016. Maximum Difference Between Increasing Elements    
*/
class Solution {
    func maximumDifference(_ nums: [Int]) -> Int {
        let n = nums.count
        if n < 2 { return -1 }
        var ans = -1
        var runningMin = nums[0]
        for i in 1..<n {
            if nums[i] > runningMin {
                ans = max(ans, nums[i] - runningMin)
            }
            runningMin = min(runningMin, nums[i])
        }
        return ans
    }
}
let solution = Solution()
print(solution.maximumDifference([7,1,5,4])) // Expect 4
print(solution.maximumDifference([9,4,3,2]))  // Expect -1
print(solution.maximumDifference([1,5,2,10]))  // Expect -9
