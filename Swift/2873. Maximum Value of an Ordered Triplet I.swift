/*
You are given a 0-indexed integer array nums.
Return the maximum value over all triplets of indices (i, j, k) such that i < j < k. If all such triplets have a negative value, return 0.
The value of a triplet of indices (i, j, k) is equal to (nums[i] - nums[j]) * nums[k].
    
2873. Maximum Value of an Ordered Triplet I    
*/
class Solution {
    func maximumTripletValue(_ nums: [Int]) -> Int {
        let n = nums.count
        var maxVal = 0
        for i in 0..<(n - 2) {
            for j in (i + 1)..<(n - 1) {
                for k in (j + 1)..<n {
                    let value = (nums[i] - nums[j]) * nums[k]
                    maxVal = max(maxVal, value)
                }
            }
        }
        return maxVal
    }
}
let solution = Solution()
print(solution.maximumTripletValue([12,6,1,2,7])) // Expect 77
print(solution.maximumTripletValue([1,10,3,4,19]))  // Expect 133
print(solution.maximumTripletValue([1,2,3]))  // Expect 0