/*
You are given a positive integer days representing the total number of days an employee is available for work (starting from day 1). 
    You are also given a 2D array meetings of size n where, 
    meetings[i] = [start_i, end_i] represents the starting and ending days of meeting i (inclusive).
Return the count of days when the employee is available for work but no meetings are scheduled.
Note: The meetings may overlap.
    
3169. Count Days Without Meetings    
*/
class Solution {
    func countDays(_ days: Int, _ meetings: [[Int]]) -> Int {
        if meetings.isEmpty {
            return days
        }
        
        let sortedMeetings = meetings.sorted { $0[0] < $1[0] }
        
        var mergedMeetings: [[Int]] = []
        for meeting in sortedMeetings {
            let start = meeting[0]
            let end = meeting[1]
            if mergedMeetings.isEmpty || mergedMeetings.last![1] < start - 1 {
                mergedMeetings.append([start, end])
            } 
            else {
                mergedMeetings[mergedMeetings.count - 1][1] = max(mergedMeetings.last![1], end)
            }
        }
        
        var meetingDays = 0
        for interval in mergedMeetings {
            meetingDays += (interval[1] - interval[0] + 1)
            if meetingDays >= days {
                return 0
            }
        }
        
        return days - meetingDays        
    }
}
let solution = Solution()
print(solution.countDays(10, [[5,7],[1,3],[9,10]])); // Expect 2
print(solution.countDays(5, [[2,4],[1,3]])); // Expect 1
print(solution.countDays(6, [[1,6]])); // Expect 0