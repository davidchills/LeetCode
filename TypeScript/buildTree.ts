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
			const node = queue.shift()!;
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