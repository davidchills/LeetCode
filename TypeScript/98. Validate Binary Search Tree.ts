/*
Given a binary tree root, a node X in the tree is named good if in the path from root to X there are no nodes with a value greater than X.
Return the number of good nodes in the binary tree.
*/
/**
 * 98. Validate Binary Search Tree
 */
// Define the TreeNode class with proper TypeScript types
// @filename: buildTree.ts
import { buildTree, TreeNode } from "./buildTree.ts";
/*
class TreeNode {
    val: number;
    left: TreeNode | null;
    right: TreeNode | null;

    constructor(val?: number, left?: TreeNode | null, right?: TreeNode | null) {
        this.val = val ?? 0;
        this.left = left ?? null;
        this.right = right ?? null;
    }
}

// Function to build a tree from an array representation
function buildTree(arr: (number | null)[]): TreeNode | null {
    const n = arr.length;
    if (n === 0 || arr[0] === null) return null;

    const root = new TreeNode(arr[0]);
    const queue: TreeNode[] = [root];
    let i = 1;

    while (i < n) {
        const node = queue.shift() as TreeNode;

        if (i < n && arr[i] !== null) {
            node.left = new TreeNode(arr[i]!);
            queue.push(node.left);
        }
        i++;

        if (i < n && arr[i] !== null) {
            node.right = new TreeNode(arr[i]!);
            queue.push(node.right);
        }
        i++;
    }
    return root;
}
*/
function isValidBST(root: TreeNode | null): boolean {
    const validate = function(node: TreeNode | null, minV: number, maxV: number): boolean {
        if (node === null) { return true; }
        if (node.val <= minV || node.val >= maxV) { return false; }
        return validate(node.left, minV, node.val) && validate(node.right, node.val, maxV);
    }
    return validate(root, -Infinity, Infinity);
};

//const root = buildTree([2,1,3]); // Expect true
const root = buildTree([5,1,4,null,null,3,6]); // Expect false

console.log(isValidBST(root));
