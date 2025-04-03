/*
You are given a 0-indexed integer array nums.
Return the maximum value over all triplets of indices (i, j, k) such that i < j < k. If all such triplets have a negative value, return 0.
The value of a triplet of indices (i, j, k) is equal to (nums[i] - nums[j]) * nums[k].
    
2874. Maximum Value of an Ordered Triplet II    
*/
class Solution {
    func maximumTripletValue(_ nums: [Int]) -> Int {
        let n = nums.count
        if n < 3 { return 0 }
        
        // Build the prefix maximum array.
        var prefixMax = Array(repeating: 0, count: n)
        prefixMax[0] = nums[0]
        for i in 1..<n {
            prefixMax[i] = max(prefixMax[i - 1], nums[i])
        }
        
        // Build the suffix maximum array.
        var suffixMax = Array(repeating: 0, count: n)
        suffixMax[n - 1] = nums[n - 1]
        for i in (0..<(n - 1)).reversed() {
            suffixMax[i] = max(suffixMax[i + 1], nums[i])
        }
        
        var maxValue = Int.min
        for j in 1..<(n - 1) {
            // For each j, compute the candidate value:
            let candidate = (prefixMax[j - 1] - nums[j]) * suffixMax[j + 1]
            maxValue = max(maxValue, candidate)
        }
        
        return max(maxValue, 0)        
    }
}
let solution = Solution()
print(solution.maximumTripletValue([12,6,1,2,7])) // Expect 77
print(solution.maximumTripletValue([1,10,3,4,19])) // Expect 133
print(solution.maximumTripletValue([1,2,3])) // Expect 0

/*
Hint 1
Preprocess the prefix maximum array, prefix_max[i] = max(nums[0], nums[1], …, nums[i]) and the suffix maximum array, suffix_max[i] = max(nums[i], nums[i + 1], …, nums[i - 1]).
Hint 2
For each index j, find two indices i and k such that i < j < k and (nums[i] - nums[j]) * nums[k] is the maximum, using the prefix and suffix maximum arrays.
Hint 3
For index j, the maximum triplet value is (prefix_max[j - 1] - nums[j]) * suffix_max[j + 1].
*/