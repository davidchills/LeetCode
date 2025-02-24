/*
Given the root of a binary tree, invert the tree, and return its root.
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
function printTree(node) {
    if (node === null) { return; }
    console.log(node.val);
    printTree(node.left);
    printTree(node.right);
}
/**
 * 226. Invert Binary Tree
 * @param {TreeNode} root
 * @return {TreeNode}
 */
var invertTree = function(root) {
    /*
    if (root === null) { return root; }
    const leftNode = root.left;
    root.left = invertTree(root.right);
    root.right = invertTree(leftNode);
    return root;
    */
    if (root === null) { return root; }
    const queue = [root];
    while (queue.length > 0) {
        let node = queue.shift();
        [node.left, node.right] = [node.right, node.left];
        if (node.left) queue.push(node.left);
        if (node.right) queue.push(node.right);
    }
    return root;
};

const root = new TreeNode(4);
root.left = new TreeNode(2, new TreeNode(1), new TreeNode(3));
root.right = new TreeNode(7, new TreeNode(6), new TreeNode(9));

printTree(invertTree(root)); // Expect [4,7,2,9,6,3,1]
