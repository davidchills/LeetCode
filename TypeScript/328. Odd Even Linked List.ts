/*
Given the head of a singly linked list, group all the nodes with odd indices together followed by 
    the nodes with even indices, and return the reordered list.
The first node is considered odd, and the second node is even, and so on.
Note that the relative order inside both the even and odd groups should remain as it was in the input.
You must solve the problem in O(1) extra space complexity and O(n) time complexity.

328. Odd Even Linked List
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

function oddEvenList(head: ListNode | null): ListNode | null {
    if (head === null || head.next === null) { return head; }
    let odd: ListNode = head;
    let even: ListNode | null = head.next;
    let evenHead: ListNode | null = even; 
    while (even !== null && even.next !== null) {
        odd.next = even.next;
        odd = odd.next;
        even.next = odd.next;
        even = even.next;
    }
    odd.next = evenHead;
    return head;      
};

const head = buildList([1,2,3,4,5]); // Expect [1,3,5,2,4]
//const head = buildList([2,1,3,5,6,4,7]); // Expect [2,3,6,7,1,5,4]
console.log(listToArray(oddEvenList(head)));