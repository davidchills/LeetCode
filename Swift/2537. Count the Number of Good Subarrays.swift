/*
Given an integer array nums and an integer k, return the number of good subarrays of nums.
A subarray arr is good if there are at least k pairs of indices (i, j) such that i < j and arr[i] == arr[j].
A subarray is a contiguous non-empty sequence of elements within an array.
    
2537. Count the Number of Good Subarrays    
*/
class Solution {
    func countGood(_ nums: [Int], _ k: Int) -> Int {
        let n = nums.count
        var count = 0
        var left = 0
        var pair = 0
        var freq: [Int: Int] = [:]
        for right in 0..<n {
            pair += freq[nums[right], default: 0]
            freq[nums[right], default: 0] += 1
            while pair >= k {
                count += n - right
                freq[nums[left], default: 0] -= 1
                pair -= freq[nums[left], default: 0]
                left += 1
            }
        }
        return count
    }
}
let solution = Solution()
print(solution.countGood([1,1,1,1,1], 10)) // Expect 1
print(solution.countGood([3,1,4,3,2,2,4], 2))  // Expect 4