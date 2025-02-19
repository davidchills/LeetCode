/*
Given the head of a linked list, reverse the nodes of the list k at a time, and return the modified list.

k is a positive integer and is less than or equal to the length of the linked list. If the number of nodes is not a multiple of k then left-out nodes, in the end, should remain as it is.

You may not alter the values in the list's nodes, only nodes themselves may be changed.
*/

// Definition for singly-linked list.
function ListNode(val, next) {
    this.val = (val===undefined ? 0 : val)
    this.next = (next===undefined ? null : next)
}

function printList(head) {
    const arr = [];
    while (head !== null) {
        arr.push(head.val);
        head = head.next;
    }
    console.log(arr.join(' -> '));
}
/**
 * 25. Reverse Nodes in k-Group
 * @param {ListNode} head
 * @param {number} k
 * @return {ListNode}
 */
var reverseKGroup = function(head, k) {
    if (!head || k === 1) { return head; }

    let dummy = new ListNode(0);
    dummy.next = head;

    let prev = dummy;
    let curr = dummy;
    let next = dummy;
    let count = 0;

    while (curr.next) {
        curr = curr.next;
        count++;
    }

    while (count >= k) {
        curr = prev.next;
        next = curr.next;
        for (let i = 1; i < k; i++) {
            curr.next = next.next;
            next.next = prev.next;
            prev.next = next;
            next = curr.next;
        }
        prev = curr;
        count -= k;
    }

    return dummy.next;    
};

const head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));
const k = 2;
// Expect [2,1,4,3,5]


//const head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));
//const k = 3;
// Expect [3,2,1,4,5]

printList(reverseKGroup(head, k));