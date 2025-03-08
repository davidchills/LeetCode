/*
Given a binary tree root, a node X in the tree is named good if in the path from root to X there are no nodes with a value greater than X.
Return the number of good nodes in the binary tree.
*/
import { buildTree, TreeNode } from "./buildTree.js"; 
/**
 * 1448. Count Good Nodes in Binary Tree
 * @param {TreeNode} root
 * @return {number}
 */
var goodNodes = function(root) {
    //let currentMax = Number.MIN_SAFE_INTEGER;
    
    const dfs = function(node, currentMax) {
        if (node === null) { return 0; }
        let good = node.val >= currentMax ? 1 :0;
        currentMax = Math.max(currentMax, node.val);
        return good + dfs(node.left, currentMax) + dfs(node.right, currentMax);
    }
    return dfs(root, Number.MIN_SAFE_INTEGER);
};
const root = buildTree([2,null,4,10,8,null,null,4]); // Expect 4
//const root = buildTree([3,1,4,3,null,1,5]); // Expect 4
//const root = buildTree([3,3,null,4,2]); // Expect 3
//const root = buildTree([1]); // Expect 1
console.log(goodNodes(root));
