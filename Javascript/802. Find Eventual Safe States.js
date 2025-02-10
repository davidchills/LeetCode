/**
 * 802. Find Eventual Safe States
 * @param {number[][]} graph
 * @return {number[]}
 */
var eventualSafeNodes = function(graph) {
    const n = graph.length
    //const reversedGraph = new Array(n).fill([])
    const reversedGraph = Array.from({ length: n }, () => []);
    const inDegree = new Array(n).fill(0)
    
    graph.forEach((edges, node) => {
        edges.forEach((neighbor) => {
            reversedGraph[neighbor].push(node)
            inDegree[node]++
        })
    })
    
    const queue = []
    for (let i = 0; i < n; i++) {
        if (inDegree[i] === 0) { queue.push(i) }
    }
    
    const safeNodes = []
    while (queue.length !== 0) {
        let node = queue.shift()
        safeNodes.push(node)
        
        reversedGraph[node].forEach((neighbor) => {
            inDegree[neighbor]--
            if (inDegree[neighbor] === 0) {
                queue.push(neighbor)
            }
        })
    }
    safeNodes.sort((a, b) => a - b);
    return safeNodes
};

console.log(eventualSafeNodes([[1,2],[2,3],[5],[0],[5],[],[]])); // Expect [2,4,5,6]
//console.log(eventualSafeNodes([[1,2,3,4],[1,2],[3,4],[0,4],[]])); // Expect [4]

