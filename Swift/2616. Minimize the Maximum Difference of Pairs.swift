/*
You are given a 0-indexed integer array nums and an integer p. 
Find p pairs of indices of nums such that the maximum difference amongst all the pairs is minimized. 
Also, ensure no index appears more than once amongst the p pairs.
Note that for a pair of elements at the index i and j, the difference of this pair is |nums[i] - nums[j]|, 
    where |x| represents the absolute value of x.
Return the minimum maximum difference among all p pairs. We define the maximum of an empty set to be zero.
    
2616. Minimize the Maximum Difference of Pairs    
*/
class Solution {
    func minimizeMax(_ nums: [Int], _ p: Int) -> Int {
        if p == 0 { return 0 }
        let nums = nums.sorted()
        
        func checkForPairs(_ diff: Int) -> Bool {
            var count = 0
            var i = 1
            let n = nums.count
            
            while i < n {
                if nums[i] - nums[i - 1] <= diff {
                    count += 1
                    i += 2
                }
                else {
                    i += 1
                }
                if count >= p { return true }
            }
            return false
        }
        
        var left = 0
        var right = nums.last! - nums.first!
        
        while left <= right {
            let mid = (left + right) / 2
            if checkForPairs(mid) {
                right = mid - 1
            }
            else {
                left = mid + 1
            }
        }
        return left
    }
}
let solution = Solution()
print(solution.minimizeMax([10,1,2,7,1,3], 2)) // Expect 1
print(solution.minimizeMax([4,2,1,2], 1))  // Expect 0