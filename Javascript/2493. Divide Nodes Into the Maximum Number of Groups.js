/**
 * 2493. Divide Nodes Into the Maximum Number of Groups
 * @param {number} n
 * @param {number[][]} edges
 * @return {number}
 */
var magnificentSets = function(n, edges) {
    let uf = new UnionFind(n + 1);
    let graph = Array(n + 1).fill(0).map(() => []);
    for (let [a, b] of edges) { // 1. Build graph, connect nodes
        graph[a].push(b);
        graph[b].push(a);
        uf.union(a, b);
    }
  
    let groups = {};
    for (let i = 1; i <= n; i++) { // 2. Find groups of connected nodes
        let parent = uf.find(i);
        if (!groups[parent]) groups[parent] = [];
        groups[parent].push(i);
    }
  
    let totalGroups = 0;
    for (let parent in groups) { // 3. Find the maximum groups to divide for each connected group
        let group = groups[parent];
        let maxGroups = 0;
        for (let node of group) {
            let numGroups = bfs(graph, node);
            if (numGroups === -1) { return -1; }
            maxGroups = Math.max(maxGroups, numGroups);
        }

        totalGroups += maxGroups;
    }

    return totalGroups;
};

function bfs(graph, startNode) {
    let queue = [startNode], n = graph.length;
    let levels = Array(n).fill(-1), level = 0;
    levels[startNode] = 0;
    while (queue.length) {
        for (let i = queue.length; i > 0; i--) {
            let node = queue.shift();
            for (let nei of graph[node]) {
                if (levels[nei] === -1) {
                    levels[nei] = level + 1;
                    queue.push(nei);
                } 
                else if (levels[nei] === level) { // found an odd-lengthed cycle, we can't divide into groups
                    return -1;
                }
            }
        }
        level++;
    }
    return level;
}

class UnionFind {
    constructor(size) {
        this.root = Array(size);
        this.rank = Array(size)
        for (var i = 0; i < size; i++) {
            this.root[i] = i;
            this.rank[i] = 1;
        }
    }
    find(x) {
        if (this.root[x] === x) {
            return x;
        }
        return this.root[x] = this.find(this.root[x]);
    }
    union(x, y) {
        let rootX = this.find(x);
        let rootY = this.find(y);
        if (rootX !== rootY) {
            if (this.rank[rootX] > this.rank[rootY]) {
                this.root[rootY] = rootX;
            } 
            else if (this.rank[rootX] < this.rank[rootY]) {
                this.root[rootX] = rootY;
            } 
            else {
                this.root[rootY] = rootX;
                this.rank[rootX]++;
            }
        }
    }
    connected(x, y) {
        return this.find(x) === this.find(y);
    }
}

//console.log(magnificentSets(6, [[1,2],[1,4],[1,5],[2,6],[2,3],[4,6]])); // Expect 4
//console.log(magnificentSets(3, [[1,2],[2,3],[3,1]])); // Expect -1
console.log(magnificentSets(92, [[67,29],[13,29],[77,29],[36,29],[82,29],[54,29],[57,29],[53,29],[68,29],[26,29],[21,29],[46,29],[41,29],[45,29],[56,29],[88,29],[2,29],[7,29],[5,29],[16,29],[37,29],[50,29],[79,29],[91,29],[48,29],[87,29],[25,29],[80,29],[71,29],[9,29],[78,29],[33,29],[4,29],[44,29],[72,29],[65,29],[61,29]])); // Expect 57

