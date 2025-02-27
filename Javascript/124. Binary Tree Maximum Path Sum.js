/*
A path in a binary tree is a sequence of nodes where each pair of adjacent nodes in the sequence has an edge connecting them. 
A node can only appear in the sequence at most once. Note that the path does not need to pass through the root.
The path sum of a path is the sum of the node's values in the path.
Given the root of a binary tree, return the maximum path sum of any non-empty path.
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
/**
 * 124. Binary Tree Maximum Path Sum
 * @param {TreeNode} root
 * @return {number}
 */
var maxPathSum = function(root) {
    let maxSum = Number.MIN_SAFE_INTEGER;
    
    const findMaxPath = function(node) {
        if (node === null) { return 0; }
        
        const leftMax = Math.max(findMaxPath(node.left), 0);
        const rightMax = Math.max(findMaxPath(node.right), 0);
        
        const currentPathSum = node.val + leftMax + rightMax;
        
        maxSum = Math.max(maxSum, currentPathSum);
        
        return node.val + Math.max(leftMax, rightMax);
    }
    
    findMaxPath(root);
    
    return maxSum;
};
/*
const root = new TreeNode(1,
    new TreeNode(2, null, null),
    new TreeNode(3, null, null)
);
*/
const root = new TreeNode(-10,
    new TreeNode(9, null, null),
    new TreeNode(20,
        new TreeNode(15, null, null),
        new TreeNode(7, null, null)
    )
);
console.log(maxPathSum(root)); // Expect 42
