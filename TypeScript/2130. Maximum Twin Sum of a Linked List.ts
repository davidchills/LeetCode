/*
In a linked list of size n, where n is even, the ith node (0-indexed) of the linked list is known as the twin of the (n-1-i)th node, 
    if 0 <= i <= (n / 2) - 1.
For example, if n = 4, then node 0 is the twin of node 3, and node 1 is the twin of node 2. These are the only nodes with twins for n = 4.
The twin sum is defined as the sum of a node and its twin.
Given the head of a linked list with even length, return the maximum twin sum of the linked list.

2130. Maximum Twin Sum of a Linked List
*/
class ListNode {
    val: number;
    next: ListNode | null;

    constructor(val?: number, next?: ListNode | null) {
        this.val = val ?? 0;
        this.next = next ?? null;
    }
}

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

function pairSum(head: ListNode | null): number {
    if (head === null || head.next === null) { return 0; }
    let slow: ListNode | null = head;
    let fast: ListNode | null = head;
    
    while (fast !== null && fast.next !== null) {
        slow = slow.next;
        fast = fast.next.next;
    }
    
    function reverseList (head: ListNode | null): ListNode | null {
        let prev: ListNode | null = null;
        while (head !== null) {
            const next: ListNode | null = head.next;
            head.next = prev;
            prev = head;
            head = next;
        }
        return prev;
    }
    
    let secondHalf: ListNode | null = reverseList(slow);
    let maxSum: number = 0;
    let firstHalf: ListNode | null = head;
    
    while (secondHalf !== null) {
        maxSum = Math.max(maxSum, firstHalf.val + secondHalf.val);
        firstHalf = firstHalf.next;
        secondHalf = secondHalf.next
    }
    return maxSum;    
};

const head = buildList([5,4,2,1]); // Expect 6
//const head = buildList([4,2,2,3]); // Expect 7
//const head = buildList([1,100000]); // Expect 100001
console.log(pairSum(head));