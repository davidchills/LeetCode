/*
You are given the root of a binary tree.
A ZigZag path for a binary tree is defined as follow:
Choose any node in the binary tree and a direction (right or left).
If the current direction is right, move to the right child of the current node; otherwise, move to the left child.
Change the direction from right to left or from left to right.
Repeat the second and third steps until you can't move in the tree.
Zigzag length is defined as the number of nodes visited - 1. (A single node has a length of 0).
Return the longest ZigZag path contained in that tree.
*/
import { TreeNode, buildTree } from './buildTree.js'
/**
 * 1372. Longest ZigZag Path in a Binary Tree
 * @param {TreeNode} root
 * @return {number}
 */
var longestZigZag = function(root) {
    let maxLength = 0;
    function dfs (node) {
        if (!node) { return [-1, -1]; }
        const left = dfs(node.left);
        const right = dfs(node.right);
        const leftLength = left[1] + 1;
        const rightLength = right[0] + 1;
        maxLength = Math.max(maxLength, leftLength, rightLength);
        return [leftLength, rightLength];
    }
    dfs(root)
    return maxLength;
};
const root1 = buildTree([1,null,1,1,1,null,null,1,1,null,1,null,null,null,1]);
const root2 = buildTree([1,1,1,null,1,null,null,1,1,null,1]);
const root3 = buildTree([1]);
console.log(longestZigZag(root1)); // Expect 3
console.log(longestZigZag(root2)); // Expect 4
console.log(longestZigZag(root3)); // Expect 0
