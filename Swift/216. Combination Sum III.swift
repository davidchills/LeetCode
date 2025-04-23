/*
Find all valid combinations of k numbers that sum up to n such that the following conditions are true:
Only numbers 1 through 9 are used.
Each number is used at most once.
Return a list of all possible valid combinations. 
The list must not contain the same combination twice, and the combinations may be returned in any order.
    
216. Combination Sum III    
*/
class Solution {
    func combinationSum3(_ k: Int, _ n: Int) -> [[Int]] {
        var result = [[Int]]()
        var combo = [Int]()
        func backtrack(_ start: Int, _ remaining: Int) {
            if combo.count == k {
                if remaining == 0 {
                    result.append(combo)
                }
                return
            }
            for num in start..<10 {
                if num > remaining { break }
                let picksLeft = k - combo.count - 1
                let maxPossibleSum = (num + 1 + 9) * picksLeft / 2
                if remaining - num > maxPossibleSum {
                    continue
                }
                combo.append(num)
                backtrack(num + 1, remaining - num)
                combo.removeLast()
            }
        }
        backtrack(1, n)
        return result
    }
}
let solution = Solution()
print(solution.combinationSum3(3, 7)) // Expect [[1,2,4]]
print(solution.combinationSum3(3, 9)) // Expect [[1,2,6],[1,3,5],[2,3,4]]
print(solution.combinationSum3(4, 1)) // Expect []