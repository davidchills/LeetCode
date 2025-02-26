/*
Given the root of a binary tree, flatten the tree into a "linked list":

The "linked list" should use the same TreeNode class where the right child pointer points to the next node in the list 
    and the left child pointer is always null.
The "linked list" should be in the same order as a pre-order traversal of the binary tree.
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
function printNode(node) {
    if (node === null) { return; }
    console.log(node.val);
    //printNode(node.left);
    printNode(node.right);
}  
/**
 * 114. Flatten Binary Tree to Linked List
 * @param {TreeNode} root
 * @return {void} Do not return anything, modify root in-place instead.
 */
var flatten = function(root) {
    let current = root;
    while (current !== null) {
        if (current.left !== null) {
            let predecessor = current.left;
            while (predecessor.right !== null) {
                predecessor = predecessor.right;
            }
            predecessor.right = current.right;
            // Move left to the right
            current.right = current.left;
            // Set all lefts to null
            current.left = null;
        }
        current = current.right;
    }
};
const root = new TreeNode(1,
    new TreeNode(2, new TreeNode(3), new TreeNode(4)),
    new TreeNode(5, null, new TreeNode(6))
);

flatten(root); 
printNode(root); // Expect [1,null,2,null,3,null,4,null,5,null,6]