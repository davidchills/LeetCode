/*
You are given a positive integer days representing the total number of days an employee is available for work (starting from day 1). 
    You are also given a 2D array meetings of size n where, 
    meetings[i] = [start_i, end_i] represents the starting and ending days of meeting i (inclusive).
Return the count of days when the employee is available for work but no meetings are scheduled.
Note: The meetings may overlap.

3169. Count Days Without Meetings
*/

function countDays(days: number, meetings: number[][]): number {
    // If no meeting, then all days are available.
    if (meetings.length === 0) { return days; }
    // Sort meetings by start day.
    meetings.sort((a, b) => a[0] - b[0]);
    const mergedMeetings: number[][] = [];
    let meetingDays = 0;
    for (let [start, end] of meetings) {
        const n: number = mergedMeetings.length;
        if (n === 0 || mergedMeetings[n - 1][1] < start - 1) {
            mergedMeetings.push([start, end]);
        }
        else {
            mergedMeetings[n - 1][1] = Math.max(mergedMeetings[n - 1][1], end);
        }
    }
    for (let [start, end] of mergedMeetings) {
        meetingDays += (end - start + 1);
        if (meetingDays >= days) { return 0; }
    }
    return days - meetingDays;    
};

console.log(countDays(10, [[5,7],[1,3],[9,10]])); // Expect 2
console.log(countDays(5, [[2,4],[1,3]])); // Expect 1
console.log(countDays(6, [[1,6]])); // Expect 0