/*
Given a binary tree, find the lowest common ancestor (LCA) of two given nodes in the tree.
According to the definition of LCA on Wikipedia: 
    “The lowest common ancestor is defined between two nodes p and q as the lowest node in T that has both p and q as descendants 
    (where we allow a node to be a descendant of itself).”
*/
import { buildTree, TreeNode } from "./buildTree.js";
/**
 * 236. Lowest Common Ancestor of a Binary Tree
 * @param {TreeNode} root
 * @param {TreeNode} p
 * @param {TreeNode} q
 * @return {TreeNode}
 */
var lowestCommonAncestor = function(root, p, q) {
    if (root === null || root.val === p.val || root.val === q.val) {
        return root;
    }
    
    const left = lowestCommonAncestor(root.left, p, q);
    const right = lowestCommonAncestor(root.right, p, q);
    
    if (left !== null && right !== null) {
        return root;
    }    
    
    return left !== null ? left : right;
};

//const root = buildTree([3,5,1,6,2,0,8,null,null,7,4]);
//const p = buildTree([5, null, null]);
//const q = buildTree([1, null, null]); // Expect 3

//const root = buildTree([3,5,1,6,2,0,8,null,null,7,4]);
//const p = buildTree([5, null, null]);
//const q = buildTree([4, null, null]); // Expect 5

const root = buildTree([1,2]);
const p = buildTree([1, null, null]);
const q = buildTree([2, null, null]); // Expect 1

console.log(lowestCommonAncestor(root, p, q));
