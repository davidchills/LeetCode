/**
 * 3160. Find the Number of Distinct Colors Among the Balls
 * @param {number} limit
 * @param {number[][]} queries
 * @return {number[]}
 */
var queryResults = function(limit, queries) {
    const colorMap = new Map();
    const colorCount = new Map();
    const result = [];
    
    queries.forEach((query) => {
        let [x, y] = query;
        if (colorMap.has(x)) {
            let oldColor = colorMap.get(x);
            colorCount.set(oldColor, colorCount.get(oldColor) - 1);
            
            if (colorCount.get(oldColor) === 0) {
                colorCount.delete(oldColor);
            }
        }
        colorMap.set(x, y);
        colorCount.set(y, (colorCount.get(y) || 0) + 1);
        result.push(colorCount.size);
        
    });
    return result;
};


//console.log(queryResults(4, [[1,4],[2,5],[1,3],[3,4]])); // Expect [1,2,2,3]
//console.log(queryResults(4, [[0,1],[1,2],[2,2],[3,4],[4,5]])); // Expect [1,2,2,3,4]
console.log(queryResults(1, [[0,1],[1,4],[1,1],[1,4],[1,1]])); // Expect [1,2,1,2,1]



