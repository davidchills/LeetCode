/*
Given the root of a binary tree, return the level order traversal of its nodes' values. (i.e., from left to right, level by level).
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
/**
 * 102. Binary Tree Level Order Traversal
 * @param {TreeNode} root
 * @return {number[][]}
 */
var levelOrder = function(root) {
    if (root === null) { return []; }
    const result = [];
    
    const dfs = function(node, level) {
        if (node === null) { return; }
        if (!result[level]) result[level] = [];
        result[level].push(node.val);
        dfs(node.left, level + 1);
        dfs(node.right, level + 1);
    };
    
    dfs(root, 0);
    return result;
};
const root = new TreeNode(3,
    new TreeNode(9, null, null),
    new TreeNode(20,
        new TreeNode(15, null, null),
        new TreeNode(7, null, null)
    )
);// Expect [[3],[9,20],[15,7]]

//const root = new TreeNode(1, null, null); // Expect [[1]]
//const root = new TreeNode(null, null, null); // Expect []

console.log(levelOrder(root));
