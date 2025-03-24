/*
You are given a positive integer days representing the total number of days an employee is available for work (starting from day 1). 
    You are also given a 2D array meetings of size n where, 
    meetings[i] = [start_i, end_i] represents the starting and ending days of meeting i (inclusive).
Return the count of days when the employee is available for work but no meetings are scheduled.
Note: The meetings may overlap.
*/
/**
 * 3169. Count Days Without Meetings
 * @param {number} days
 * @param {number[][]} meetings
 * @return {number}
 */
var countDays = function(days, meetings) {
    meetings.sort((a, b) => a[0] - b[0]);
    const merged = [];
    let meetingDays = 0;
    for (let [start, end] of meetings) {
        const n = merged.length;
        if (n === 0 || merged[n - 1][1] < start - 1) {
            merged.push([start, end]);
        }
        else {
            merged[n - 1][1] = Math.max(merged[n - 1][1], end);
        }
    }
    for (let [start, end] of merged) {
        meetingDays += (end - start + 1);
        if (meetingDays >= days) { return 0; }
    }
    return days - meetingDays;
};

console.log(countDays(10, [[5,7],[1,3],[9,10]])); // Expect 2
console.log(countDays(5, [[2,4],[1,3]])); // Expect 1
console.log(countDays(6, [[1,6]])); // Expect 0
