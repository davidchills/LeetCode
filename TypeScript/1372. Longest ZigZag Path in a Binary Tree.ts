/*
You are given the root of a binary tree.
A ZigZag path for a binary tree is defined as follow:
Choose any node in the binary tree and a direction (right or left).
If the current direction is right, move to the right child of the current node; otherwise, move to the left child.
Change the direction from right to left or from left to right.
Repeat the second and third steps until you can't move in the tree.
Zigzag length is defined as the number of nodes visited - 1. (A single node has a length of 0).
Return the longest ZigZag path contained in that tree.

1372. Longest ZigZag Path in a Binary Tree
*/
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

function longestZigZag(root: TreeNode | null): number {
    let maxLength = 0;
    function dfs (node: TreeNode | null): number[] {
        if (!node) { return [-1, -1]; }
        const left = dfs(node.left);
        const right = dfs(node.right);
        const leftLength = left[1] + 1;
        const rightLength = right[0] + 1;
        maxLength = Math.max(maxLength, leftLength, rightLength);
        return [leftLength, rightLength];
    }
    dfs(root)
    return maxLength;    
};

const root1 = buildTree([1,null,1,1,1,null,null,1,1,null,1,null,null,null,1]);
const root2 = buildTree([1,1,1,null,1,null,null,1,1,null,1]);
const root3 = buildTree([1]);
console.log(longestZigZag(root1)); // Expect 3
console.log(longestZigZag(root2)); // Expect 4
console.log(longestZigZag(root3)); // Expect 0