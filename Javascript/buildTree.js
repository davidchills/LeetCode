export function TreeNode(val, left, right) {
    this.val = (val === undefined ? 0 : val)
    this.left = (left === undefined ? null : left)
    this.right = (right === undefined ? null : right)
}
export function buildTree(arr) {
	const n = arr.length;
	if (n === 0 || arr[0] === null) { return null; }
	const root = new TreeNode(arr[0]);
	const queue = [root];
	let i = 1;
	while (i < n) {
		const node = queue.shift();
		
		if (i < n && arr[i] !== null) {
			node.left = new TreeNode(arr[i]);
			queue.push(node.left);
		}
		i++;
		
		if (i < n && arr[i] !== null) {
			node.right = new TreeNode(arr[i]);
			queue.push(node.right);
		}
		i++;
	}
	return root;
}
export function printTree(root) {
	if (root === null) {
		console.log("Empty Tree");
		return;
	}
	let queue = [root];
	let levelValues = [];
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
// import { TreeNode, buildTree, printTree } from './buildTree.js'
//export { TreeNode, buildTree };
//console.log(buildTree([1,2,3,null,5,null,4]));