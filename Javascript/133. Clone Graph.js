/*
Given a reference of a node in a connected undirected graph.
Return a deep copy (clone) of the graph.
Each node in the graph contains a value (int) and a list (List[Node]) of its neighbors.
*/
function Node(val, neighbors) {
    this.val = val;
    this.neighbors = neighbors ? neighbors : [];
}
/**
 * 133. Clone Graph
 * @param {_Node} node
 * @return {_Node}
 */
var cloneGraph = function(node) {
    if (!node) return null;
    
    const visited = new Map();
    
    const clone = (node) => {
        if (visited.has(node)) {
            return visited.get(node);
        }
        
        let clonedNode = new Node(node.val);
        visited.set(node, clonedNode);
        
        clonedNode.neighbors = node.neighbors.map(neighbor => clone(neighbor));
        
        return clonedNode;
    };
    
    return clone(node);    
};

const node1 = new Node(1);
const node2 = new Node(2);
const node3 = new Node(3);
node1.neighbors = [node2, node3];
node2.neighbors = [node1, node3];
node3.neighbors = [node1, node2];
console.log(cloneGraph(node1));