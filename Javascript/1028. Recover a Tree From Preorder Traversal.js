/*
We run a preorder depth-first search (DFS) on the root of a binary tree.

At each node in this traversal, we output D dashes (where D is the depth of this node), then we output the value of this node.  If the depth of a node is D, the depth of its immediate child is D + 1.  The depth of the root node is 0.

If a node has only one child, that child is guaranteed to be the left child.

Given the output traversal of this traversal, recover the tree and return its root.
*/
/**
 * Definition for a binary tree node.
 */
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}

function printPreorder(root) {
    if (root === null) { return; }
    console.log(root.val);
    printPreorder(root.left);
    printPreorder(root.right);
}

/**
 * 1028. Recover a Tree From Preorder Traversal
 * @param {string} traversal
 * @return {TreeNode}
 */
var recoverFromPreorder = function(traversal) {
    let i = 0;
    
    const parseNode = (depth) => {
        let dashes = 0;
        while (i < traversal.length && traversal[i] === '-') {
            dashes++;
            i++;
        }
        
        if (dashes !== depth) {
            i -= dashes; // Backtrack if depth doesn't match
            return null;
        }
        
        let numStart = i;
        while (i < traversal.length && traversal[i] >= '0' && traversal[i] <= '9') {
            i++;
        }
        
        let node = new TreeNode(parseInt(traversal.slice(numStart, i)));
        node.left = parseNode(depth + 1);
        node.right = parseNode(depth + 1);
        
        return node;
    };
    
    return parseNode(0);    
};

//printPreorder(recoverFromPreorder("1-401--349---90--88")); // Expect [1,401,null,349,88,90]
printPreorder(recoverFromPreorder("1-2--3---4-5--6---7")); // Expect [1,2,5,3,null,6,null,4,null,7]
//printPreorder(recoverFromPreorder("1-401--349---90--88")); // Expect [1,401,null,349,88,90]
