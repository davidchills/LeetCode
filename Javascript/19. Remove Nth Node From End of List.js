/*
Given the head of a linked list, remove the nth node from the end of the list and return its head.
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
 * 19. Remove Nth Node From End of List
 * @param {ListNode} head
 * @param {number} n
 * @return {ListNode}
 */
var removeNthFromEnd = function(head, n) {
    let dummy = new ListNode(0, head);
    let first = dummy;
    let second = dummy;
    
    for (let i = 0; i <= n; i++) {
        first = first.next;
    }
    
    while (first !== null) {
        first = first.next;
        second = second.next;
    }
    second.next = second.next.next;
    
    return dummy.next;
};

//const head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));
//const n = 2;
// Expect [1,2,3,5]


//const head = new ListNode(1);
//const n = 1;
// Expect []

const head = new ListNode(1, new ListNode(2));
const n = 1;
// Expect [1]

printList(removeNthFromEnd(head, n));