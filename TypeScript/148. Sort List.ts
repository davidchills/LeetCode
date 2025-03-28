/*
Description

Problem
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
function listToArray(head: ListNode | null): number[] {
    let arr = [];
    while (head) {
        arr.push(head.val);
        head = head.next;
    }
    return arr;
}

function sortList(head: ListNode | null): ListNode | null {
    if (!head || !head.next) { return head; }
    function getMid (head: ListNode | null): ListNode | null {
        let slow = head;
        let fast = head.next;
        
        while (fast && fast.next) {
            slow = slow.next;
            fast = fast.next.next;
        }
        return slow;
    }
    function merge (l1: ListNode | null, l2: ListNode | null): ListNode | null {
        const dummy = new ListNode();
        let tail = dummy;
        
        while (l1 && l2) {
            if (l1.val < l2.val) {
                tail.next = l1;
                l1 = l1.next;
            }
            else {
                tail.next = l2;
                l2 = l2.next;
            }
            tail = tail.next;
        }
        if (l1) { tail.next = l1; }
        else { tail.next = l2; }
        
        return dummy.next;    
    }
    const mid = getMid(head);
    const right = sortList(mid.next);
    mid.next = null;
    const left = sortList(head);
    
    return merge(left, right);
    
};

const head1 = buildList([4,2,1,3]); // Expect [1,2,3,4]
const head2 = buildList([-1,5,3,4,0]); // Expect [-1,0,3,4,5]
const head3 = buildList([]); // Expect []

console.log(listToArray(sortList(head1)));
console.log(listToArray(sortList(head2)));
console.log(listToArray(sortList(head3)));