/*
Given the root of a complete binary tree, return the number of the nodes in the tree.
According to Wikipedia, every level, except possibly the last, is completely filled in a complete binary tree, 
    and all nodes in the last level are as far left as possible. It can have between 1 and 2h nodes inclusive at the last level h.
Design an algorithm that runs in less than O(n) time complexity.
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
/**
 * 222. Count Complete Tree Nodes
 * @param {TreeNode} root
 * @return {number}
 */
var countNodes = function(root) {
    if (!root) { return 0; }
    
    const getDepth = function(node) {
        let depth = 0;
        while (node) {
            node = node.left;
            depth++;
        }
        return depth;
    }
    
    let leftDepth = getDepth(root.left);
    let rightDepth = getDepth(root.right);
    
    if (leftDepth === rightDepth) {
        return (1 << leftDepth) + countNodes(root.right);
    }
    else {
        return (1 << rightDepth) + countNodes(root.left);
    }
    
};
const root = new TreeNode(1,
    new TreeNode(2, 
        new TreeNode(4, null, null),
        new TreeNode(6, null, null)
    ),
    new TreeNode(3,
        new TreeNode(6, null, null),
        null
    )
); // Expect 6
console.log(countNodes(root));
