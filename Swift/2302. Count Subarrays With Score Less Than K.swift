/*
The score of an array is defined as the product of its sum and its length.
For example, the score of [1, 2, 3, 4, 5] is (1 + 2 + 3 + 4 + 5) * 5 = 75.
Given a positive integer array nums and an integer k, return the number of non-empty subarrays of nums whose score is strictly less than k.
A subarray is a contiguous sequence of elements within an array.
    
2302. Count Subarrays With Score Less Than K    
*/
class Solution {
    func countSubarrays(_ nums: [Int], _ k: Int) -> Int {
        let n = nums.count
        var result = 0
        var windowSum = 0
        var right = 0
        
        for left in 0..<n {
            while right < n && (windowSum + nums[right]) * (right - left + 1) < k {
                windowSum += nums[right]
                right += 1
            }
            result += right - left
            windowSum -= nums[left]
        }
        return result
    }
}
let solution = Solution()
print(solution.countSubarrays([2,1,4,3,5], 10)) // Expect 6
print(solution.countSubarrays([1,1,1], 5))  // Expect 5