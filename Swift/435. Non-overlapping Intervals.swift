/*
Given an array of intervals intervals where intervals[i] = [starti, endi], 
    return the minimum number of intervals you need to remove to make the rest of the intervals non-overlapping.
Note that intervals which only touch at a point are non-overlapping. For example, [1, 2] and [2, 3] are non-overlapping.
    
435. Non-overlapping Intervals    
*/
class Solution {
    func eraseOverlapIntervals(_ intervals: [[Int]]) -> Int {
        let sorted = intervals.sorted { $0[1] < $1[1] }        
        var removed = 0
        var previousEnd = Int.min
        
        for interval in sorted {
            let start = interval[0]
            let end = interval[1]
            if start >= previousEnd {
                previousEnd = end
            } 
            else { removed += 1 }
        }
        
        return removed        
    }
}
let solution = Solution()
print(solution.eraseOverlapIntervals([[1,2],[2,3],[3,4],[1,3]])) // Expect 1
print(solution.eraseOverlapIntervals([[1,2],[1,2],[1,2]]))  // Expect 2
print(solution.eraseOverlapIntervals([[1,2],[2,3]]))  // Expect 0