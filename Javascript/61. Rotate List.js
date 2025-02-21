/*
Given the head of a linked list, rotate the list to the right by k places.
*/

// Definition for singly-linked list.
function ListNode(val, next) {
    this.val = (val===undefined ? 0 : val)
    this.next = (next===undefined ? null : next)
}

function createLinkedList(arr) {
    if (arr.length === 0) { return null; }
    const head = new ListNode(arr.shift());
    let current = head;
    arr.forEach((val) => {
        current.next = new ListNode(val);
        current = current.next;
    });
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
 * 61. Rotate List
 * @param {ListNode} head
 * @param {number} k
 * @return {ListNode}
 */
var rotateRight = function(head, k) {
    if (!head || !head.next || k === 0) { return head; }
    // Find the length
    let listLength = 1;
    let tail = head;
    while (tail.next) {
        tail = tail.next;
        listLength++;
    }
    
    k = k % listLength;
    // No rotation needed
    if (k === 0) { return head; }
    // Make the list circular
    tail.next = head;
    // Find the new head
    
    let newTail = head;   
    for (let i = 1; i < listLength - k; i++) {
        newTail = newTail.next;
    }
    // Set new head
    let newHead = newTail.next;
    newTail.next = null;
    return newHead;
};


const head = createLinkedList([1,2,3,4,5]); // Expect [4,5,1,2,3]
const k = 2;

//const head = createLinkedList([0,1,2]); // Expect [2,0,1]
//const k = 4;
printList(rotateRight(head, k));
