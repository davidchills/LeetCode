/*
Given a root node reference of a BST and a key, delete the node with the given key in the BST. 
    Return the root node reference (possibly updated) of the BST.
Basically, the deletion can be divided into two stages:
Search for a node to remove.
If the node is found, delete the node.

450. Delete Node in a BST
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

function printTree(root: TreeNode | null) {
	if (root === null) {
		console.log("Empty Tree");
		return;
	}
	let queue: TreeNode[] = [root];
	let levelValues: number[] = [];
	while (queue.length > 0) {
		const levelSize = queue.length;
		for (let i = 0; i < levelSize; i++) {
			const node = queue.shift();
			levelValues.push(node.val);
			if (node.left !== null) {
				queue.push(node.left);
			}
			if (node.right !== null) {
				queue.push(node.right);
			}			
		}
	}
	console.log(levelValues);
}

function deleteNode(root: TreeNode | null, key: number): TreeNode | null {
    if (root === null) { return null; }
    function getMin(node: TreeNode): TreeNode {
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