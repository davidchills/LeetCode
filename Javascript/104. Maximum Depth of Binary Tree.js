/*
Given the root of a binary tree, return its maximum depth.
A binary tree's maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
/**
 * 104. Maximum Depth of Binary Tree
 * @param {TreeNode} root
 * @return {number}
 */
var maxDepth = function(root) {
    if (root === null) { return 0; }
    const queue = [root];
    let depth = 0;
    
    while (queue.length > 0) {
        const levelSize = queue.length;
        for (let i = 0; i < levelSize; i++) {
            const node = queue.shift();
            if (node.left !== null) { queue.push(node.left); }
            if (node.right !== null) { queue.push(node.right); }
        }
        depth++
    }
    return depth;
};

const root = new TreeNode(3,
    new TreeNode(9, null, null),
    new TreeNode(20,
        new TreeNode(15, null, null),
        new TreeNode(7, null, null)
    )
); // 3
console.log(maxDepth(root));