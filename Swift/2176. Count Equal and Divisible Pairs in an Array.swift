/*
Given a 0-indexed integer array nums of length n and an integer k, 
    return the number of pairs (i, j) where 0 <= i < j < n, such that nums[i] == nums[j] and (i * j) is divisible by k.
    
2176. Count Equal and Divisible Pairs in an Array    
*/
class Solution {
    func countPairs(_ nums: [Int], _ k: Int) -> Int {
        let n = nums.count
        var result = 0 
        for i in 0..<n {
            for j in (i + 1)..<n {
                if nums[i] == nums[j] && (i * j) % k == 0 {
                    result += 1
                }
            }
        }
        return result
    }
}
let solution = Solution()
print(solution.countPairs([3,1,2,2,2,1,3], 2)) // Expect 4
print(solution.countPairs([1,2,3,4], 2)) // Expect 0