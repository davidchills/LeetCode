/*
Consider all the leaves of a binary tree, from left to right order, the values of those leaves form a leaf value sequence.

872. Leaf-Similar Trees
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
function leafSimilar(root1: TreeNode | null, root2: TreeNode | null): boolean {
    const leaves1: number[] = getLeafSequence(root1);
    const leaves2: number[] = getLeafSequence(root2);
    if (leaves1.length !== leaves2.length) { return false; }
    for (let i = 0; i < leaves1.length; i++) {
        if (leaves1[i] !== leaves2[i]) { return false; }
    }
    return true;    
    function getLeafSequence (node: TreeNode | null): number[] {
        const leaves: number[] = [];
        dfs(node, leaves);
        return leaves;
    }
    function dfs(node: TreeNode | null, leaves: number[]): void {
        if (node === null) { return; }
        if (node.left === null && node.right === null) {
             leaves.push(node.val);
        }
        dfs(node.left, leaves);
        dfs(node.right, leaves);
    }    
};

const root1 = buildTree([3,5,1,6,2,9,8,null,null,7,4]);
const root2 = buildTree([3,5,1,6,7,4,2,null,null,null,null,null,null,9,8]); // Expect true
//const root1 = buildTree([1,2,3]);
//const root2 = buildTree([1,3,2]); // Expect false
//const root1 = buildTree([3,5,1,6,2,9,8,null,null,7,14]);
//const root2 = buildTree([3,5,1,6,71,4,2,null,null,null,null,null,null,9,8]); // Expect false
console.log(leafSimilar(root1, root2));