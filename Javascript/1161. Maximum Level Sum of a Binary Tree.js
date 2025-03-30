/*
Given the root of a binary tree, the level of its root is 1, the level of its children is 2, and so on.
Return the smallest level x such that the sum of all the values of nodes at level x is maximal.
*/
import { TreeNode, buildTree } from './buildTree.js'
/**
 * 1161. Maximum Level Sum of a Binary Tree
 * @param {TreeNode} root
 * @return {number}
 */
var maxLevelSum = function(root) {
    if (!root) { return 0; }
    const queue = [root];
    let level = 1;
    let maxSum = root.val;
    let maxLevel = 1;
    
    while (queue.length > 0) {
        const levelSize = queue.length;
        let sum = 0;
        for (let i = 0; i < levelSize; i++) {
            const node = queue.shift();
            sum += node.val;
            if (node.left) {
                queue.push(node.left);
            }
            if (node.right) {
                queue.push(node.right);
            }
        }
        if (sum > maxSum) {
            maxSum = sum;
            maxLevel = level;
        }
        level += 1;
    }
    return maxLevel;
};

const root1 = buildTree([1,7,0,7,-8,null,null]); // Expect 2
const root2 = buildTree([989,null,10250,98693,-89388,null,null,null,-32127]); // Expect 2
const root3 = buildTree([-100,-200,-300,-20,-5,-10,null]); // Expect 3
console.log(maxLevelSum(root1));
console.log(maxLevelSum(root2));
console.log(maxLevelSum(root3));
