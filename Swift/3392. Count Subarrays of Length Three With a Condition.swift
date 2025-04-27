/*
Given an integer array nums, return the number of subarrays of length 3 
such that the sum of the first and third numbers equals exactly half of the second number.
    
3392. Count Subarrays of Length Three With a Condition    
*/
class Solution {
    func countSubarrays(_ nums: [Int]) -> Int {
        let n = nums.count
        var result = 0
        for i in 2..<n {
            // multiply left side two instead of division of the right side
            if (nums[i - 2] + nums[i]) * 2 == nums[i - 1] {
                result += 1
            }
        }
        return result
    }
}
let solution = Solution()
print(solution.countSubarrays([1,2,1,4,1])) // Expect 1
print(solution.countSubarrays([1,1,1]))  // Expect 0