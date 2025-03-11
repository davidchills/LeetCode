/*
Given a binary tree, find the lowest common ancestor (LCA) of two given nodes in the tree.
According to the definition of LCA on Wikipedia: 
    “The lowest common ancestor is defined between two nodes p and q as the lowest node in T that has both p and q as descendants 
    (where we allow a node to be a descendant of itself).”

236. Lowest Common Ancestor of a Binary Tree
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
function lowestCommonAncestor(root: TreeNode | null, p: TreeNode | null, q: TreeNode | null): TreeNode | null {
    if (root === null || root.val === p.val || root.val === q.val) {
        return root;
    }
    
    const left = lowestCommonAncestor(root.left, p, q);
    const right = lowestCommonAncestor(root.right, p, q);
    
    if (left !== null && right !== null) {
        return root;
    }    
    
    return left !== null ? left : right;	
};

//const root = buildTree([3,5,1,6,2,0,8,null,null,7,4]);
//const p = buildTree([5, null, null]);
//const q = buildTree([1, null, null]); // Expect 3

const root = buildTree([3,5,1,6,2,0,8,null,null,7,4]);
const p = buildTree([5, null, null]);
const q = buildTree([4, null, null]); // Expect 5

//const root = buildTree([1,2]);
//const p = buildTree([1, null, null]);
//const q = buildTree([2, null, null]); // Expect 1

console.log(lowestCommonAncestor(root, p, q));