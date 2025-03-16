/*
You are given the head of a linked list. Delete the middle node, and return the head of the modified linked list.
The middle node of a linked list of size n is the ⌊n / 2⌋th node from the start using 0-based indexing, 
    where ⌊x⌋ denotes the largest integer less than or equal to x.
For n = 1, 2, 3, 4, and 5, the middle nodes are 0, 1, 1, 2, and 2, respectively.

2095. Delete the Middle Node of a Linked List
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

function deleteMiddle(head: ListNode | null): ListNode | null {
    if (head === null || head.next === null) { return null; } 
    
    let slow: ListNode = head;
    let fast: ListNode = head;
    let prev: ListNode = null;
    
    while (fast !== null && fast.next !== null) {
        prev = slow;
        slow = slow.next;
        fast = fast.next.next;
    }
    
    if (prev !== null) {
        prev.next = slow.next;
    }
    
    return head;    
};

//const head = buildList([1,3,4,7,1,2,6]); // Expect [1,3,4,1,2,6]
//const head = buildList([1,2,3,4]); // Expect [1,2,4]
const head = buildList([2,1]); // Expect [2]
console.log(listToArray(deleteMiddle(head))); // Expect true