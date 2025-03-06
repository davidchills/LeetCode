/*
Given the root of a binary tree, return the average value of the nodes on each level in the form of an array. 
    Answers within 10-5 of the actual answer will be accepted.
*/
import { buildTree, TreeNode } from "./buildTree.js";    
/**
 * 637. Average of Levels in Binary Tree
 * @param {TreeNode} root
 * @return {number[]}
 */
var averageOfLevels = function(root) {
    if (root === null) { return []; }
    const result = [];
    const queue = [root];
    
    while (queue.length > 0) {
        const levelSize = queue.length;
        let levelSum = 0;
        for (let i = 0; i < levelSize; i++) {
            const node = queue.shift();
            levelSum += node.val; 
            if (node.left !== null) { queue.push(node.left); }
            if (node.right !== null) { queue.push(node.right); }            
        }
 
        result.push(levelSum / levelSize);
    }
    return result;
};
//const root = buildTree([3,9,20,null,null,15,7]); // Expect [3.00000,14.50000,11.00000]
const root = buildTree([3,9,20,15,7]); // Expect [3.00000,14.50000,11.00000]
console.log(averageOfLevels(root));
