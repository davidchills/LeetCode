/*
Given the head of a singly linked list, reverse the list, and return the reversed list.

206. Reverse Linked List
*/
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

function reverseList(head: ListNode | null): ListNode | null {
    if (head === null) { return head; }
    let prev: ListNode | null = null;
    let current: ListNode | null = head;
    while (current !== null) {
        const next: ListNode | null = current.next;
        current.next = prev;
        prev = current
        current = next;
    }
    return prev;    
};

//const head = buildList([1,2,3,4,5]); // Expect [5,4,3,2,1]
//const head = buildList([1,2]); // Expect [2,1]
const head = buildList([]); // Expect []
console.log(listToArray(reverseList(head))); // Expect true
