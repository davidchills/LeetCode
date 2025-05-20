/*
You are given an integer array nums of length n and a 2D array queries, where queries[i] = [li, ri].
For each queries[i]:
Select a subset of indices within the range [li, ri] in nums.
Decrement the values at the selected indices by 1.
A Zero Array is an array where all elements are equal to 0.
Return true if it is possible to transform nums into a Zero Array after processing all the queries sequentially, otherwise return false.
    
3355. Zero Array Transformation I    
*/
class Solution {
    func isZeroArray(_ nums: [Int], _ queries: [[Int]]) -> Bool {
        let n = nums.count
        var diff = Array(repeating: 0, count: n + 1)
        var curr = 0
        
        for query in queries {
            let l = query[0]
            let r = query[1]
            diff[l] += 1
            if r + 1 < diff.count {
                diff[r + 1] -= 1
            }
        }
        
        for i in 0..<n {
            curr += diff[i]
            if curr < nums[i] {
                return false
            }
        }
        
        return true
    }
}
let solution = Solution()
print(solution.isZeroArray([1,0,1], [[0,2]])) // Expect true
print(solution.isZeroArray([4,3,2,1], [[1,3],[0,2]]))  // Expect false