/*
Given a root node reference of a BST and a key, delete the node with the given key in the BST. 
    Return the root node reference (possibly updated) of the BST.
Basically, the deletion can be divided into two stages:
Search for a node to remove.
If the node is found, delete the node.
*/
/**
 * 450. Delete Node in a BST
 * @param {TreeNode} root
 * @param {number} key
 * @return {TreeNode}
 */
import { TreeNode, buildTree, printTree } from './buildTree.js'
var deleteNode = function(root, key) {
    if (root === null) { return null; }
    function getMin(node) {
        while (node.left !== null) {
            node = node.left;
        }
        return node;
    }
    if (key < root.val) {
        root.left = deleteNode(root.left, key);
    }
    else if (key > root.val) {
        root.right = deleteNode(root.right, key);
    }
    else {
        if (root.left === null) {
            return root.right;
        }
        else if (root.right === null) {
            return root.left;
        }
        
        const minNode = getMin(root.right);
        root.val = minNode.val;
        root.right = deleteNode(root.right, minNode.val);
    }
    return root;
};

const root1 = buildTree([5,3,6,2,4,null,7]);
const root2 = buildTree([5,3,6,2,4,null,7]);
const root3 = buildTree([]);

printTree(deleteNode(root1, 3)); // Expect [5,4,6,2,null,null,7]
printTree(deleteNode(root2, 0)); // Expect [5,3,6,2,4,null,7]
printTree(deleteNode(root3, 0)); // Expect []

