/*
Given a 0-indexed integer array nums of size n and two integers lower and upper, return the number of fair pairs.
A pair (i, j) is fair if:
0 <= i < j < n, and
lower <= nums[i] + nums[j] <= upper
    
2563. Count the Number of Fair Pairs    
*/
extension Array where Element: Comparable {
    func bisectLeft(_ target: Element, lo: Int = 0, hi: Int? = nil) -> Int {
        let hi = hi ?? self.count
        var left = lo
        var right = hi
        while left < right {
            let mid = (left + right) / 2
            if self[mid] < target { left = mid + 1 } 
            else { right = mid }
        }
        return left
    }

    func bisectRight(_ target: Element, lo: Int = 0, hi: Int? = nil) -> Int {
        let hi = hi ?? self.count
        var left = lo
        var right = hi
        while left < right {
            let mid = (left + right) / 2
            if self[mid] <= target { left = mid + 1 } 
            else { right = mid }
        }
        return left
    }
}
class Solution {
    func countFairPairs(_ nums: [Int], _ lower: Int, _ upper: Int) -> Int {
        let sortedNums = nums.sorted()
        let n = sortedNums.count
        var result = 0
        
        for i in 0..<n {
            let x = sortedNums[i]
            let loVal = lower - x
            let hiVal = upper - x
            let leftIndex  = sortedNums.bisectLeft(loVal,  lo: i + 1)
            let rightIndex = sortedNums.bisectRight(hiVal, lo: i + 1)
            result += (rightIndex - leftIndex)
        }
        
        return result        
    }
}
let solution = Solution()
print(solution.countFairPairs([0,1,7,4,4,5], 3, 6)) // Expect 6
print(solution.countFairPairs([1,7,9,2,5], 11, 11))  // Expect 1