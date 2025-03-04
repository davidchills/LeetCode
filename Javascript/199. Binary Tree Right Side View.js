/*
Given the root of a binary tree, imagine yourself standing on the right side of it, 
    return the values of the nodes you can see ordered from top to bottom.
*/
/**
 * 199. Binary Tree Right Side View
 * @param {TreeNode} root
 * @return {number[]}
 */
import { buildTree, TreeNode } from "./buildTree.js";
var rightSideView = function(root) {
    if (root === null) { return []; }
    const result = [];
    const queue = [root];
    
    while (queue.length > 0) {
        const size = queue.length;
        for (let i = 0; i < size; i++) {
            const node = queue.shift();
            if (i === size - 1) {
                result.push(node.val);
            }
            if (node.left !== null) { queue.push(node.left); }
            if (node.right !== null) { queue.push(node.right); }
        }
    }
    return result;
};
//const root = buildTree([1,2,3,null,5,null,4]); // Expect [1,3,4]
//const root = buildTree([1,2,3,4,null,null,null,5]); // Expect [1,3,4,5]
//const root = buildTree([1,null,3]); // Expect [1,3]
const root = buildTree([]); // Expect []
console.log(rightSideView(root));
