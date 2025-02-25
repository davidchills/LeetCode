/*
Given two integer arrays preorder and inorder where preorder is the preorder traversal of a binary tree and 
    inorder is the inorder traversal of the same tree, construct and return the binary tree.
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
function printPreorder(node) {
    if (node === null) { return; }
    console.log(node.val);
    printPreorder(node.left);
    printPreorder(node.right);
}    
/**
 * 105. Construct Binary Tree from Preorder and Inorder Traversal
 * @param {number[]} preorder
 * @param {number[]} inorder
 * @return {TreeNode}
 */
var buildTree = function(preorder, inorder) {
    const n = preorder.length;
    if (!preorder || !inorder) { return null; }
    const inorderIndexMap = new Map(); 
    
    for (let i = 0; i < n; i++) {
        inorderIndexMap.set(inorder[i], i);
    }
    
    const constructTree = function (preLeft, preRight, inLeft, inRight) {
        if (preLeft > preRight || inLeft > inRight) { return null; }
        const rootVal = preorder[preLeft];
        const root = new TreeNode(rootVal);
        let rootIndexInOrder = inorderIndexMap.get(rootVal);
        let leftSubTreeSize = rootIndexInOrder - inLeft;
        
        root.left = constructTree(preLeft + 1, preLeft + leftSubTreeSize, inLeft, rootIndexInOrder - 1);
        root.right = constructTree(preLeft + leftSubTreeSize + 1, preRight, rootIndexInOrder + 1, inRight);
        
        return root;
    }
    
    return constructTree(0, n - 1, 0, n - 1);
};

const preorder = [3,9,20,15,7];
const inorder = [9,3,15,20,7];
// Expected [3,9,20,null,null,15,7]

printPreorder(buildTree(preorder, inorder));