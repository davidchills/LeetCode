/*
Given an integer array nums, return the length of the longest strictly increasing subsequence.
Follow up: Can you come up with an algorithm that runs in O(n log(n)) time complexity?
    
300. Longest Increasing Subsequence    
*/
extension Array where Element: Comparable {
    /// Returns the leftmost index at which `target` could be inserted
    /// to keep the array sorted.
    func bisectLeft(_ target: Element) -> Int {
        var lo = 0
        var hi = self.count
        while lo < hi {
            let mid = lo + (hi - lo) / 2
            if self[mid] < target { lo = mid + 1 } 
            else { hi = mid }
        }
        return lo
    }
}
class Solution {
    func lengthOfLIS(_ nums: [Int]) -> Int {
        var tails = [Int]()
        for num in nums {
            let index = tails.bisectLeft(num)
            if index == tails.count {
                tails.append(num)
            }
            else {
                tails[index] = num
            }
        }
        return tails.count
    }
}
let solution = Solution()
print(solution.lengthOfLIS([10,9,2,5,3,7,101,18])) // Expect 4
print(solution.lengthOfLIS([0,1,0,3,2,3]))  // Expect 4
print(solution.lengthOfLIS([7,7,7,7,7,7,7]))  // Expect 1