/*
We define a harmonious array as an array where the difference between its maximum value and its minimum value is exactly 1.
Given an integer array nums, return the length of its longest harmonious subsequence among all its possible subsequences.
    
594. Longest Harmonious Subsequence    
*/
class Solution {
    func findLHS(_ nums: [Int]) -> Int {
        let n = nums.count
        let sorted = nums.sorted()
        var ans = 0
        var left = 0
        for right in 0..<n {
            while sorted[right] - sorted[left] > 1 {
                left += 1
            }
            if sorted[right] - sorted[left] == 1 {
                ans = max(ans, right - left + 1)
            }
        }
        return ans
    }
}
let solution = Solution()
print(solution.findLHS([1,3,2,2,5,2,3,7])) // Expect 5
print(solution.findLHS([1,2,3,4])) // Expect 2
print(solution.findLHS([1,1,1,1])) // Expect 0