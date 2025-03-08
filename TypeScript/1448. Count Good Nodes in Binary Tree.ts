/*
Given a binary tree root, a node X in the tree is named good if in the path from root to X there are no nodes with a value greater than X.
Return the number of good nodes in the binary tree.
*/
/**
 * 1448. Count Good Nodes in Binary Tree
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

function goodNodes(root: TreeNode | null): number {
    const dfs = function(node, currentMax) {
        if (node === null) { return 0; }
        let good = node.val >= currentMax ? 1 : 0;
        currentMax = Math.max(currentMax, node.val);
        return good + dfs(node.left, currentMax) + dfs(node.right, currentMax);
    }
    return dfs(root, -Infinity);
};

//const root = buildTree([2,null,4,10,8,null,null,4]); // Expect 4
//const root = buildTree([3,1,4,3,null,1,5]); // Expect 4
//const root = buildTree([3,3,null,4,2]); // Expect 3
const root = buildTree([1]); // Expect 1

console.log(goodNodes(root));
