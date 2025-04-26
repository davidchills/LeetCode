/*
You are given an integer array nums and two integers minK and maxK.
A fixed-bound subarray of nums is a subarray that satisfies the following conditions:
The minimum value in the subarray is equal to minK.
The maximum value in the subarray is equal to maxK.
Return the number of fixed-bound subarrays.
A subarray is a contiguous part of an array.
    
2444. Count Subarrays With Fixed Bounds    
*/
class Solution {
    func countSubarrays(_ nums: [Int], _ minK: Int, _ maxK: Int) -> Int {
        let n = nums.count
        var result = 0
        var leftBound = -1
        var lastMin = -1
        var lastMax = -1
        for i in 0..<n {
            if nums[i] < minK || nums[i] > maxK {
                leftBound = i
            }
            if nums[i] == minK { lastMin = i }
            if nums[i] == maxK { lastMax = i }
            if lastMin > leftBound && lastMax > leftBound {
                result += min(lastMin, lastMax) - leftBound
            }
        }
        return result
    }
}
let solution = Solution()
print(solution.countSubarrays([1,3,5,2,7,5], 1, 5)) // Expect 2
print(solution.countSubarrays([1,1,1,1], 1, 1)) // Expect 10