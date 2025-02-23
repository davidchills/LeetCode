/*
Given the head of a linked list and a value x, partition it such that all nodes less than x come before nodes greater than or equal to x.

You should preserve the original relative order of the nodes in each of the two partitions.
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
 * 86. Partition List
 * @param {ListNode} head
 * @param {number} x
 * @return {ListNode}
 */
var partition = function(head, x) {
    const beforeHead = new ListNode(0);
    let before = beforeHead;
    const afterHead = new ListNode(0);
    let after = afterHead;
    
    while (head) {
        if (head.val < x) {
            before.next = head;
            before = before.next;
        }
        else {
            after.next = head;
            after = after.next;
        }
        head = head.next;
    }
    after.next = null;
    before.next = afterHead.next;
    
    return beforeHead.next;
};


//const head = createLinkedList([1,4,3,2,5,2]); // Expect [1,2,2,4,3,5]
//const x = 3;

//const head = createLinkedList([2,1]); // Expect [1,2]
//const x = 2;
    
const head = createLinkedList([-8,-7,7,5,3,-7,-8,-1,9,-2,4,6,-4,-1,3,0,4,-8,-8,-8,8,6,-4,-4]); // Expect [-8,-7,-7,-8,-1,-2,-4,-1,-8,-8,-8,-4,-4,7,5,3,9,4,6,3,0,4,8,6]
const x = 0;
    
printList(partition(head, x));
