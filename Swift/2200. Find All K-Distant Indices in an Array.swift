/*
You are given a 0-indexed integer array nums and two integers key and k. 
A k-distant index is an index i of nums for which there exists at least one index j such that |i - j| <= k and nums[j] == key.
Return a list of all k-distant indices sorted in increasing order.
    
2200. Find All K-Distant Indices in an Array    
*/
class Solution {
    func findKDistantIndices(_ nums: [Int], _ key: Int, _ k: Int) -> [Int] {
        let n = nums.count
        var ans = [Int]()
        var diff = Array(repeating: 0, count: n + 1)
        var keyIndex = [Int]()
        var running = 0
        for (i, v) in nums.enumerated() {
            if v == key { keyIndex.append(i) }
        }
        if keyIndex.isEmpty { return [] }
        
        for j in keyIndex {
            let left = max(0, j - k)
            let right = min(n - 1, j + k)
            diff[left] += 1
            diff[right + 1] -= 1
        }
        for i in 0..<n {
            running += diff[i]
            if running > 0 {
                ans.append(i)
            }
        }
        return ans
    }
}
let solution = Solution()
print(solution.findKDistantIndices([3,4,9,1,3,9,5], 9, 1)) // Expect [1,2,3,4,5,6]
print(solution.findKDistantIndices([2,2,2,2,2], 2, 2)) // Expect [0,1,2,3,4]