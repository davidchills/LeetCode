/*
You are given an integer array nums and an integer k. You want to find a subsequence of nums of length k that has the largest sum.
Return any such subsequence as an integer array of length k.
A subsequence is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.
    
2099. Find Subsequence of Length K With the Largest Sum    
*/
class Solution {
    func maxSubsequence(_ nums: [Int], _ k: Int) -> [Int] {
        let indexed = nums.enumerated().map { (value: $0.element, index: $0.offset) }
        let sub = indexed.sorted { $0.value > $1.value }.prefix(k)
        let ordered = sub.sorted { $0.index < $1.index }
        return ordered.map { $0.value }
    }
}
let solution = Solution()
print(solution.maxSubsequence([2,1,3,3], 2)) // Expect [3,3]
print(solution.maxSubsequence([-1,-2,3,4], 3)) // Expect [-1,3,4]
print(solution.maxSubsequence([3,4,3,3], 2)) // Expect [3,4]