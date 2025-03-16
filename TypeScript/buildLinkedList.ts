
// Define the ListNode class with proper TypeScript types
class ListNode {
    val: number;
    next: ListNode | null;

    constructor(val?: number, next?: ListNode | null) {
        this.val = val ?? 0;
        this.next = next ?? null;
    }
}

// Function to build a tree from an array representation
function buildList(arr: (number | null)[]): ListNode | null {
    const n = arr.length;
    if (n === 0 || arr[0] === null) { return null; }

    const root = new ListNode(arr[0]);
    const queue: ListNode[] = [root];
    let i = 1;

    while (i < n) {
        const node = queue.shift() as ListNode;

        if (i < n && arr[i] !== null) {
            node.next = new ListNode(arr[i]!);
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