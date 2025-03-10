/*
Given the root of a binary tree, determine if it is a valid binary search tree (BST).
A valid BST is defined as follows:
The left subtree of a node contains only nodes with keys less than the node's key.
The right subtree of a node contains only nodes with keys greater than the node's key.
Both the left and right subtrees must also be binary search trees.
*/
import { buildTree, TreeNode } from "./buildTree.js"; 
/**
 * 98. Validate Binary Search Tree
 * @param {TreeNode} root
 * @return {boolean}
 */
var isValidBST = function(root) {
    function validate(node, minV, maxV) {
        if (node === null) { return true; }
        if (node.val <= minV || node.val >= maxV) { return false; }
        return validate(node.left, minV, node.val) && validate(node.right, node.val, maxV);
    }
    return validate(root, Number.MIN_SAFE_INTEGER, Number.MAX_SAFE_INTEGER);
};
//const root = buildTree([2,1,3]); // Expect true
const root = buildTree([5,1,4,null,null,3,6]); // Expect false
console.log(isValidBST(root));
