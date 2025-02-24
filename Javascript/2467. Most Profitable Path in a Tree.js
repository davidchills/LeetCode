/*
There is an undirected tree with n nodes labeled from 0 to n - 1, rooted at node 0. You are given a 2D integer array edges of length n - 1 where edges[i] = [ai, bi] indicates that there is an edge between nodes ai and bi in the tree.

At every node i, there is a gate. You are also given an array of even integers amount, where amount[i] represents:

the price needed to open the gate at node i, if amount[i] is negative, or,
the cash reward obtained on opening the gate at node i, otherwise.
The game goes on as follows:

Initially, Alice is at node 0 and Bob is at node bob.
At every second, Alice and Bob each move to an adjacent node. Alice moves towards some leaf node, while Bob moves towards node 0.
For every node along their path, Alice and Bob either spend money to open the gate at that node, or accept the reward. Note that:
If the gate is already open, no price will be required, nor will there be any cash reward.
If Alice and Bob reach the node simultaneously, they share the price/reward for opening the gate there. In other words, if the price to open the gate is c, then both Alice and Bob pay c / 2 each. Similarly, if the reward at the gate is c, both of them receive c / 2 each.
If Alice reaches a leaf node, she stops moving. Similarly, if Bob reaches node 0, he stops moving. Note that these events are independent of each other.
Return the maximum net income Alice can have if she travels towards the optimal leaf node.
*/
/**
 * 2467. Most Profitable Path in a Tree
 * @param {number[][]} edges
 * @param {number} bob
 * @param {number[]} amount
 * @return {number}
 */
var mostProfitablePath = function(edges, bob, amount) {
    const n = amount.length;
    const graph = new Array(n).fill(0).map(() => []);
    const bobPath = new Array(n).fill(-1);
    const localDebug = false;
    
    for (let [a, b] of edges) {
        graph[a].push(b);
        graph[b].push(a);
    }
    
    if (localDebug) { console.log("Graph:", graph); }
    
    const findBobPath = function(node, parent, depth) {
        bobPath[node] = depth;
        
        if (localDebug) { console.log(`Bob visits node ${node} at depth ${depth}`); }
        
        if (node === 0) { return true; }
        
        for (let neighbor of graph[node]) {
            if (neighbor !== parent && findBobPath(neighbor, node, depth + 1)) {
                return true;
            }
        }
        bobPath[node] = -1;
        return false;
    }
    
    const dfs = function(node, parent, time, income) {
        
        if (localDebug) { console.log(`Alice visits node ${node} at time ${time}, current income: ${income}`); }
        
        if (bobPath[node] === -1 || time < bobPath[node]) {
            // Alice beats Bob to this node. Alice takes full amount
            income += amount[node];
            if (localDebug) { console.log(`Alice takes full amount at node ${node}, new income: ${income}`); }
        }
        else if (time === bobPath[node]) {
            // Bob and Alice arrive at this node at the same time. Split reward.
            income += Math.floor(amount[node] / 2);
            if (localDebug) { console.log(`Alice and Bob split amount at node ${node}, new income: ${income}`); }
        }
        
        if (graph[node].length === 1 && graph[node][0] === parent) {
            if (localDebug) { console.log(`Reached leaf node ${node}, final income: ${income}`); }
            return income;
        }
        let maxProfit = Number.MIN_SAFE_INTEGER;
        
        for (let neighbor of graph[node]) {
            if (neighbor !== parent) {
                if (localDebug) { console.log(`Alice moves to neighbor ${neighbor} from node ${node}`); }
                maxProfit = Math.max(maxProfit, dfs(neighbor, node, time + 1, income));
            }
        }
        return maxProfit;
    }
    
    findBobPath(bob, -1, 0);
    return dfs(0, -1, 0, 0);
};

console.log(mostProfitablePath([[0,1],[1,2],[1,3],[3,4]], 3, [-2,4,2,-4,6])); // Expect 6
//console.log(mostProfitablePath([[0,1]], 1, [-7280,2350])); // Expect -7280
