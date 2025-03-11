/*
Given a reference of a node in a connected undirected graph.
Return a deep copy (clone) of the graph.
Each node in the graph contains a value (int) and a list (List[Node]) of its neighbors.

133. Clone Graph
*/
class _Node {
     val: number
     neighbors: _Node[]

     constructor(val?: number, neighbors?: _Node[]) {
         this.val = (val===undefined ? 0 : val)
         this.neighbors = (neighbors===undefined ? [] : neighbors)
     }
}

function cloneGraph(node: _Node | null): _Node | null {
    if (!node) { return null; }
    
    const visited = new Map();
    
    const clone = (node: _Node) => {
        if (visited.has(node)) {
            return visited.get(node);
        }
        
        let clonedNode = new _Node(node.val);
        visited.set(node, clonedNode);
        
        clonedNode.neighbors = node.neighbors.map(neighbor => clone(neighbor));
        
        return clonedNode;
    };
    
    return clone(node); 	
};

const node1 = new _Node(1);
const node2 = new _Node(2);
const node3 = new _Node(3);
node1.neighbors = [node2, node3];
node2.neighbors = [node1, node3];
node3.neighbors = [node1, node2];
console.log(cloneGraph(node1));