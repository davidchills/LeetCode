/*
Given an array nums of distinct integers, return all the possible permutations. You can return the answer in any order.
    
46. Permutations    
*/
class Solution {
    func permute(_ nums: [Int]) -> [[Int]] {
        let n = nums.count
        var result: [[Int]] = []
        var used = Array(repeating: false, count: n) 
        func backtrack(_ sets: [Int]) {
            var sets = sets
            if sets.count == n {
                result.append(sets)
                return
            }
            for i in 0..<n {
                if used[i] { continue; }
                used[i] = true
                sets.append(nums[i])
                backtrack(sets)
                sets.removeLast()
                used[i] = false
            }
        }
        backtrack([])
        return result   
    }
}
let solution = Solution()
print(solution.permute([1,2,3])); // Expect [[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]
print(solution.permute([0,1])); // Expect [[0,1],[1,0]]
print(solution.permute([1])); // Expect [[1]]