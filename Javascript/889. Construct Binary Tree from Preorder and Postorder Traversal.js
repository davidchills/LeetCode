/*
Given a binary tree with the following rules:
root.val == 0
For any treeNode:
If treeNode.val has a value x and treeNode.left != null, then treeNode.left.val == 2 * x + 1
If treeNode.val has a value x and treeNode.right != null, then treeNode.right.val == 2 * x + 2
Now the binary tree is contaminated, which means all treeNode.val have been changed to -1.

Implement the FindElements class:

FindElements(TreeNode* root) Initializes the object with a contaminated binary tree and recovers it.
bool find(int target) Returns true if the target value exists in the recovered binary tree.
*/
/**
 * Definition for a binary tree node.
 */
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}

function printPrePostOrder(root) {
    if (root === null) { return; }
    console.log(root.val);
    printPrePostOrder(root.left);
    printPrePostOrder(root.right);
}

/** 
 * 889. Construct Binary Tree from Preorder and Postorder Traversal
 * @param {number[]} preorder
 * @param {number[]} postorder
 * @return {TreeNode}
 */
var constructFromPrePost = function(preorder, postorder) {
    const postIndexMap = new Map(postorder.map((num, index) => [num, index]));
    let preIndex = 0;
        
    function buildTree(postLeft, postRight) {
        if (preIndex >= preorder.length || postLeft > postRight) { return null; }
        
        const root = new TreeNode(preorder[preIndex++]);
        
        if (postLeft === postRight) { return root; }
        
        const leftSubTreeIndex = postIndexMap.get(preorder[preIndex]);
        
        if (leftSubTreeIndex < postRight) {
            root.left = buildTree(postLeft, leftSubTreeIndex);
            root.right = buildTree(leftSubTreeIndex + 1, postRight - 1);
        }
        return root;
    }
    return buildTree(0, postorder.length - 1);
};
//printPrePostOrder(constructFromPrePost([1,2,4,5,3,6,7], [4,5,2,6,7,3,1])); // Expect [1,2,3,4,5,6,7]
//printPrePostOrder(constructFromPrePost([1], [1])); // Expect [1]
printPrePostOrder(constructFromPrePost([3,4,1,2], [1,4,2,3])); // Expect [3,4,2,1]