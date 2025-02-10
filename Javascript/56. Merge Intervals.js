/**
 * 56. Merge Intervals
 * @param {number[][]} intervals
 * @return {number[][]}
 */
var merge = function(intervals) {
    if (intervals.length === 0) { return []; }
    intervals.sort((a,b) => {
        if (a[0] > b[0]) { return 1; }
        if (a[0] < b[0]) { return -1; }
        return 0;
    });
    
    const merged = [intervals[0]];
    intervals.forEach((interval) => {
        let last = merged[merged.length-1];
        if (interval[0] <= last[1]) {
            merged[merged.length - 1][1] = Math.max(last[1], interval[1]);
        }
        else {
            merged.push(interval);
        }
    });

    return merged;
};

//console.log(merge([[1,3],[2,6],[8,10],[15,18]])); // Expect [[1,6],[8,10],[15,18]]
console.log(merge([[1,4],[4,5]])); // Expect [[1,5]]



