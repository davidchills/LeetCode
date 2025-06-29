/*
You are given an array of integers nums and an integer target.
Return the number of non-empty subsequences of nums such that the sum of the minimum and maximum element on it is less or equal to target. 
Since the answer may be too large, return it modulo 10^9 + 7.
    
1498. Number of Subsequences That Satisfy the Given Sum Condition    
*/
class Solution {
    func numSubseq(_ nums: [Int], _ target: Int) -> Int {
        let MOD = 1_000_000_007
        let n = nums.count
        let sorted = nums.sorted()
        var powList = [Int](repeating: 1, count: n)
        for i in 1..<n {
            powList[i] = Int((Int64(powList[i - 1]) * 2) % Int64(MOD))
        }        
        var ans = 0
        var left = 0
        var right = n - 1
        
        while left <= right {
            if sorted[left] + sorted[right] > target {
                right -= 1
            }
            else {
                ans = (ans + powList[right - left]) % MOD
                left += 1
            }
        }
        return ans
    }
}
let solution = Solution()
print(solution.numSubseq([3,5,6,7], 9)) // Expect 4
print(solution.numSubseq([3,3,6,8], 10)) // Expect 6
print(solution.numSubseq([2,3,3,4,6,7], 12)) // Expect 61