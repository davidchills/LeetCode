/**
 * 57. Insert Interval
 * @param {number[][]} intervals
 * @param {number[]} newInterval
 * @return {number[][]}
 */
var insert = function(intervals, newInterval) {
    const n = intervals.length;
    const result = [];
    let i = 0;
    
    while (i < n && intervals[i][1] < newInterval[0]) {
        result.push(intervals[i]);
        i++;
    }
    
    while (i < n && intervals[i][0] <= newInterval[1]) {
        newInterval[0] = Math.min(newInterval[0], intervals[i][0]);
        newInterval[1] = Math.max(newInterval[1], intervals[i][1]);
        i++;
    }
    result.push(newInterval);
    
    while (i < n) {
        result.push(intervals[i]);
        i++;
    }

    return result;    
};

//console.log(insert([[1,3],[6,9]], [2,5])); // Expect [[1,5],[6,9]]
//console.log(insert([[1,2],[3,5],[6,7],[8,10],[12,16]], [4,8])); // Expect [[1,2],[3,10],[12,16]]
//console.log(insert([], [5,7])); // Expect [[5,7]]
//console.log(insert([[1,5]], [2,3])); // Expect [[1,5]]
//console.log(insert([[1,5]], [6,8])); // Expect [[1,5],[6,8]]
//console.log(insert([[1,5]], [0,3])); // Expect [[0,5]]
//console.log(insert([[0,0]], [1,5])); // Expect [[0,0],[1,5]] 
console.log(insert([[3,5],[12,15]], [6,6])); // Expect [[3,5],[6,6],[12,15]]




