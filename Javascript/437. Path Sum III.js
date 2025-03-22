/*
Given the root of a binary tree and an integer targetSum, return the number of paths where the sum of the values along the path equals targetSum.
The path does not need to start or end at the root or a leaf, but it must go downwards (i.e., traveling only from parent nodes to child nodes).
*/
/**
 * 437. Path Sum III
 * @param {TreeNode} root
 * @param {number} targetSum
 * @return {number}
 */
import { TreeNode, buildTree } from './buildTree.js'
var pathSum = function(root, targetSum) {
    if (!root) { return 0; }
    const prefixSum = new Map();
    prefixSum.set(0, 1);
    function dfs (node, currentSum) {
        if (!node) { return 0; }
        currentSum += node.val;
        let paths = prefixSum.get(currentSum - targetSum) || 0;
        prefixSum.set(currentSum, (prefixSum.get(currentSum) || 0) + 1);
        paths += dfs(node.left, currentSum);
        paths += dfs(node.right, currentSum);
        prefixSum.set(currentSum, prefixSum.get(currentSum) - 1);
        return paths;
    }
    return dfs(root, 0);
};

const root1 = buildTree([10,5,-3,3,2,null,11,3,-2,null,1]);
const targetSum1 = 8; // Expect 3

const root2 = buildTree([5,4,8,11,null,13,4,7,2,null,null,5,1]);
const targetSum2 = 22; // Expect 3

console.log(pathSum(root1, targetSum1));
console.log(pathSum(root2, targetSum2));
