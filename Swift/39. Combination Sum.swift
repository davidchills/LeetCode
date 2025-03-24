/*
Given an array of distinct integers candidates and a target integer target, 
    return a list of all unique combinations of candidates where the chosen numbers sum to target. 
    You may return the combinations in any order.
The same number may be chosen from candidates an unlimited number of times. 
    Two combinations are unique if the frequency of at least one of the chosen numbers is different.
The test cases are generated such that the number of unique combinations that sum up to target is less than 150 combinations 
    for the given input.
    
39. Combination Sum    
*/
class Solution {
    func combinationSum(_ candidates: [Int], _ target: Int) -> [[Int]] {
        var result: [[Int]] = []
        var candidates = candidates.sorted()
        if candidates[0] > target { return result }
        func backtrack(_ start: Int, _ target: Int, _ combinations: inout [Int]) {
            if target < 0 { return }
            if target == 0 {
                result.append(combinations)
                return
            }
            
            for i in start..<candidates.count {
                combinations.append(candidates[i])
                backtrack(i, target - candidates[i], &combinations)
                combinations.removeLast()
            }
        }
        var combo: [Int] = []
        backtrack(0, target, &combo)
        return result
    }
}
let solution = Solution()
print(solution.combinationSum([2,3,6,7], 7)); // Expect [[2,2,3],[7]]
print(solution.combinationSum([2,3,5], 8)); // Expect [[2,2,2,2],[2,3,3],[3,5]]
print(solution.combinationSum([2], 1)); // Expect []