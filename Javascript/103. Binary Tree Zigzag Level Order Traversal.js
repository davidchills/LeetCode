/*
Given the root of a binary tree, imagine yourself standing on the right side of it, 
    return the values of the nodes you can see ordered from top to bottom.
*/
import { buildTree, TreeNode } from "./buildTree.js";    
/**
 * 103. Binary Tree Zigzag Level Order Traversal
 * @param {TreeNode} root
 * @return {number[][]}
 */
var zigzagLevelOrder = function(root) {
    if (root === null) { return []; }
    const result = [];
    const queue = [root];
    let zigzag = false;
    
    while (queue.length > 0) {
        const levelSize = queue.length;
        const levelNodes = [];
        for (let i = 0; i < levelSize; i++) {
            const node = queue.shift();
            levelNodes.push(node.val); 
            if (node.left !== null) { queue.push(node.left); }
            if (node.right !== null) { queue.push(node.right); }            
        }
        if (zigzag) {
            levelNodes.reverse();
        }   
        result.push(levelNodes);
        zigzag = !zigzag;
    }
    return result;
};
//const root = buildTree([3,9,20,null,null,15,7]); // Expect [[3],[20,9],[15,7]]
//const root = buildTree([1]); // Expect [[1]]
const root = buildTree([]); // Expect []
console.log(zigzagLevelOrder(root));
