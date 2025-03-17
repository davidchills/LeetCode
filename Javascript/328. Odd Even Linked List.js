/*
Given the head of a singly linked list, group all the nodes with odd indices together followed by 
    the nodes with even indices, and return the reordered list.
The first node is considered odd, and the second node is even, and so on.
Note that the relative order inside both the even and odd groups should remain as it was in the input.
You must solve the problem in O(1) extra space complexity and O(n) time complexity.
*/
/**
 * 328. Odd Even Linked List
 * @param {ListNode} head
 * @return {ListNode}
 */
import { ListNode, buildList, listToArray } from './buildLinkedList.js'
var oddEvenList = function(head) {
    if (head === null || head.next === null) { return head; }
    let odd = head;
    let even = head.next;
    let evenHead = even; 
    while (even !== null && even.next !== null) {
        odd.next = even.next;
        odd = odd.next;
        even.next = odd.next;
        even = even.next;
    }
    odd.next = evenHead;
    return head;     
};
//const head = buildList([1,2,3,4,5]); // Expect [1,3,5,2,4]
const head = buildList([2,1,3,5,6,4,7]); // Expect [2,3,6,7,1,5,4]
console.log(listToArray(oddEvenList(head)));
