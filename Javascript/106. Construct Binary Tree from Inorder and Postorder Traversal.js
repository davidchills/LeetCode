/*
Given two integer arrays inorder and postorder where 
    inorder is the inorder traversal of a binary tree and 
    postorder is the postorder traversal of the same tree, construct and return the binary tree.
    Inorder Traversal → [Left, Root, Right]
    Postorder Traversal → [Left, Right, Root]
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
function printPostorder(node) {
    if (node === null) { return; }
    console.log(node.val);
    printPostorder(node.left);
    printPostorder(node.right);
}    
/**
 * 106. Construct Binary Tree from Inorder and Postorder Traversal
 * @param {number[]} inorder
 * @param {number[]} postorder
 * @return {TreeNode}
 */
var buildTree = function(inorder, postorder) {
    const n = postorder.length;
    if (!inorder || !postorder) { return null; }
    const inorderIndexMap = new Map(); 
    
    for (let i = 0; i < n; i++) {
        inorderIndexMap.set(inorder[i], i);
    }
    
    let postIndex = n - 1;
    
    const constructTree = function (inLeft, inRight) {
        if (postIndex < 0 || inLeft > inRight) { return null; }
        // Root is always the last element of postorder
        const rootVal = postorder[postIndex--];
        const root = new TreeNode(rootVal);
        // Find root index in inorder using hashmap
        let rootIndexInOrder = inorderIndexMap.get(rootVal);
        let leftSubTreeSize = rootIndexInOrder - inLeft;
        // Recursively build right subtree first (since postorder is Left-Right-Root)
        root.right = constructTree(rootIndexInOrder + 1, inRight);
        root.left = constructTree(inLeft, rootIndexInOrder - 1);
                
        return root;
    }
    
    return constructTree(0, n - 1);
};

const inorder = [9,3,15,20,7];
const postorder = [9,15,7,20,3];
// Expected [3,9,20,null,null,15,7]

printPostorder(buildTree(inorder, postorder));