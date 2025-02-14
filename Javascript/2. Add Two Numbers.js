/*
You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.
*/
// Definition for singly-linked list.
function ListNode(val) {
    this.val = val;
    this.next = null;
}

function createLinkedList(arr) {
    if (arr.length === 0) { return null; }
    const head = new ListNode(arr.shift());
    let current = head;
    arr.forEach((val) => {
        current.next = new ListNode(val);
        current = current.next;
    })
    return head;
}
 
/**
 * 2. Add Two Numbers
 * @param {ListNode} l1
 * @param {ListNode} l2
 * @return {ListNode}
 */
var addTwoNumbers = function(l1, l2) {
    let dummy = new ListNode();
    let current = dummy;
    let carry = 0;
    
    while (l1 !== null || l2 !== null) {
        let val1 = (l1 !== null && l1.val) ? l1.val : 0;
        let val2 = (l2 !== null && l2.val) ? l2.val : 0;
        
        let sum = val1 + val2 + carry;
        
        carry = parseInt((sum / 10), 10);
        sum = sum % 10;
        current.next = new ListNode(sum);
        current = current.next;
        
        if (l1 !== null && l1.next) {
            l1 = l1.next;
        }
        else { l1 = null; }
        
        if (l2 !== null && l2.next) {
            l2 = l2.next;
        }
        else { l2 = null; }        
    }
    
    if (carry > 0) {
        current.next = new ListNode(carry);
    }
    
    return dummy.next;
};

l1 = createLinkedList([2,4,3]);
l2 = createLinkedList([5,6,4]); // Expect [7,0,8]

//l1 = createLinkedList([0]);
//l2 = createLinkedList([0]); // Expect [0]

//l1 = createLinkedList([9,9,9,9,9,9,9]);
//l2 = createLinkedList([9,9,9,9]); // Expect [8,9,9,9,0,0,0,1]

console.log(addTwoNumbers(l1, l2));



