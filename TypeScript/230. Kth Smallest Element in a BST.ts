/*
Given the root of a binary search tree, and an integer k, 
    return the kth smallest value (1-indexed) of all the values of the nodes in the tree.
*/
/**
 * 230. Kth Smallest Element in a BST
 */
// Define the TreeNode class with proper TypeScript types
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
function kthSmallest(root: TreeNode | null, k: number): number {
    const stack: TreeNode[] = [];
    let current: TreeNode | null = root;
    let count = 0;
    
    while (stack.length > 0 || current !== null) {
        while (current !== null) {
            stack.push(current);
            current = current.left;
        }
        current = stack.pop()!;
        count++;

        if (count === k) {
            return current.val;
        }

        current = current.right;
    }
    return -1;
};

//const root = buildTree([3,1,4,null,2]);
//const k = 1; // Expect 1

const root = buildTree([5,3,6,2,4,null,null,1]);
const k = 3; // Expect 3

console.log(kthSmallest(root, k));
