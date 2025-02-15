/*
Given the head of a singly linked list and two integers left and right where left <= right, 
reverse the nodes of the list from position left to position right, and return the reversed list.
*/
// Definition for singly-linked list.
function ListNode(val, next) {
    this.val = val;
    this.next = next;
}

function createLinkedList(arr) {
    if (arr.length === 0) { return null; }
    const head = new ListNode(arr.shift(), null);
    let current = head;
    arr.forEach((val) => {
        current.next = new ListNode(val, null);
        current = current.next;
    })
    return head;
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
 * 92. Reverse Linked List II
 * @param {ListNode} head
 * @param {number} left
 * @param {number} right
 * @return {ListNode}
 */
var reverseBetween = function(head, left, right) {
    if (head === null || left === right) { return head; }
    let dummy = new ListNode(0, head);
    let prev = dummy;
    
    for (let i = 1; i < left; i++) {
        prev = prev.next;
    }
    
    let current = prev.next;
    let next = null;
    
    for (let i = 0; i < right - left; i++) {
        next = current.next;
        current.next = next.next;
        next.next = prev.next;
        prev.next = next;
    }
    return dummy.next;
};

let head = createLinkedList([1,2,3,4,5]);
let left = 2;
let right = 4;
// Expect [1,4,3,2,5]

/*
let head = createLinkedList([5]);
let left = 1;
let right = 1;
// Expect [5]
*/
printList(reverseBetween(head, left, right));



