/*
You are given an integer eventTime denoting the duration of an event, where the event occurs from time t = 0 to time t = eventTime.
You are also given two integer arrays startTime and endTime, each of length n. 
These represent the start and end time of n non-overlapping meetings, where the ith meeting occurs during the time [startTime[i], endTime[i]].
You can reschedule at most k meetings by moving their start time while maintaining the same duration, 
    to maximize the longest continuous period of free time during the event.
The relative order of all the meetings should stay the same and they should remain non-overlapping.
Return the maximum amount of free time possible after rearranging the meetings.
Note that the meetings can not be rescheduled to a time outside the event.
    
3439. Reschedule Meetings for Maximum Free Time I    
*/
class Solution {
    func maxFreeTime(_ eventTime: Int, _ k: Int, _ startTime: [Int], _ endTime: [Int]) -> Int {
        let n = startTime.count
        var busy = 0
        var ans = 0
        
        for i in 0..<k {
            busy += endTime[i] - startTime[i]
        }
        
        if n == k {
            return eventTime - busy
        }
        
        ans = startTime[k] - busy
        
        var i = 0
        for r in k..<n {
            busy += (endTime[r] - startTime[r]) - (endTime[i] - startTime[i])
            let end = (r == n - 1) ? eventTime : startTime[r + 1]
            let start = endTime[i]
            ans = max(ans, end - start - busy)
            i += 1
        }
        
        return ans
    }
}
let solution = Solution()
print(solution.maxFreeTime(5, 1, [1,3], [2,5])) // Expect 2
print(solution.maxFreeTime(10, 1, [0,2,9], [1,4,10])) // Expect 6
print(solution.maxFreeTime(5, 2, [0,1,2,3,4], [1,2,3,4,5])) // Expect 0