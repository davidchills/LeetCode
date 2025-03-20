/*
Consider all the leaves of a binary tree, from left to right order, the values of those leaves form a leaf value sequence.
*/
/**
 * 872. Leaf-Similar Trees
 * @param {TreeNode} root1
 * @param {TreeNode} root2
 * @return {boolean}
 */
import { TreeNode, buildTree } from './buildTree.js'
var leafSimilar = function(root1, root2) {
    const leaves1 = getLeafSequence(root1);
    const leaves2 = getLeafSequence(root2);
    if (leaves1.length !== leaves2.length) { return false; }
    for (let i = 0; i < leaves1.length; i++) {
        if (leaves1[i] !== leaves2[i]) { return false; }
    }
    return true;    
    function getLeafSequence (node) {
        const leaves = [];
        dfs(node, leaves);
        return leaves;
    }
    function dfs(node, leaves) {
        if (node === null) { return; }
        if (node.left === null && node.right === null) {
             leaves.push(node.val);
        }
        dfs(node.left, leaves);
        dfs(node.right, leaves);
    }
};
//const root1 = buildTree([3,5,1,6,2,9,8,null,null,7,4]);
//const root2 = buildTree([3,5,1,6,7,4,2,null,null,null,null,null,null,9,8]); // Expect true
//const root1 = buildTree([1,2,3]);
//const root2 = buildTree([1,3,2]); // Expect false

const root1 = buildTree([3,5,1,6,2,9,8,null,null,7,14]);
const root2 = buildTree([3,5,1,6,71,4,2,null,null,null,null,null,null,9,8]); // Expect false
console.log(leafSimilar(root1, root2));
