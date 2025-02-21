/*
Given the head of a sorted linked list, delete all nodes that have duplicate numbers, 
    leaving only distinct numbers from the original list. Return the linked list sorted as well.
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
 * 82. Remove Duplicates from Sorted List II
 * @param {ListNode} head
 * @return {ListNode}
 */
var deleteDuplicates = function(head) {
    if (head === null) { return head; }

    let dummy = new ListNode(0);
    dummy.next = head;
    let prev = dummy;
    let current = head;

    while (current !== null) {
        while (current.next !== null && current.val === current.next.val) {
            current = current.next;
            
        }
        if (prev.next === current) { prev = prev.next; }
        else { prev.next = current.next; }
        current = current.next;
    }

    return dummy.next;    
};
//const head = createLinkedList([1,2,3,3,4,4,5]); // Expect [1,2,5]
const head = createLinkedList([1,1,1,2,3]); // Expect [2,3]

printList(deleteDuplicates(head));