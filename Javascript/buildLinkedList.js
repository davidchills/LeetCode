function ListNode(val, next) {
    this.val = (val === undefined ? 0 : val);
    this.next = (next === undefined ? null : next);
}
function buildList(arr) {
	const n = arr.length;
	if (n === 0 || arr[0] === null) { return null; }
	const root = new ListNode(arr[0]);
	const queue = [root];
	let i = 1;
	while (i < n) {
		const node = queue.shift();
		
		if (i < n && arr[i] !== null) {
			node.next = new ListNode(arr[i]);
			queue.push(node.next);
		}
		i++;

	}
	return root;
}
function listToArray(head) {
    let arr = [];
    while (head) {
        arr.push(head.val);
        head = head.next;
    }
    return arr;
}
export { ListNode, buildList, listToArray };
//import { listNode, buildList } from './buildLinkedList.js'
//console.log(buildTree([1,2,3,null,5,null,4]));