/*
You are given an array of positive integers nums and want to erase a subarray containing unique elements. 
The score you get by erasing the subarray is equal to the sum of its elements.
Return the maximum score you can get by erasing exactly one subarray.
An array b is called to be a subarray of a if it forms a contiguous subsequence of a, 
    that is, if it is equal to a[l],a[l+1],...,a[r] for some (l,r).
    
1695. Maximum Erasure Value    
*/
class Solution {
    func maximumUniqueSubarray(_ nums: [Int]) -> Int {
        let n = nums.count
        var seen = Set<Int>()
        seen.reserveCapacity(n)
        
        var left = 0
        var currentSum = 0
        var maxSum = 0
        
        for (right, value) in nums.enumerated() {
            while seen.contains(value) {
                currentSum -= nums[left]
                seen.remove(nums[left])
                left += 1
            }
            currentSum += nums[right]
            seen.insert(value)
            maxSum = max(maxSum, currentSum)
        }
        
        return maxSum
    }
}
let solution = Solution()
print(solution.maximumUniqueSubarray([4,2,4,5,6])) // Expect 17
print(solution.maximumUniqueSubarray([5,2,1,2,5,2,1,2,5])) // Expect 8