/*
Given the root of a binary tree and an integer targetSum, return the number of paths where the sum of the values along the path equals targetSum.
The path does not need to start or end at the root or a leaf, but it must go downwards (i.e., traveling only from parent nodes to child nodes).

437. Path Sum III
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

function pathSum(root: TreeNode | null, targetSum: number): number {
    if (!root) { return 0; }
    const prefixSum = new Map<number, number>();
    prefixSum.set(0, 1);
    function dfs (node: TreeNode | null, currentSum: number) {
        if (!node) { return 0; }
        currentSum += node.val;
        let paths: number = prefixSum.get(currentSum - targetSum) || 0;
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