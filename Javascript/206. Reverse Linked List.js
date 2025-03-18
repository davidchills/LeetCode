/*
Given the head of a singly linked list, reverse the list, and return the reversed list.
*/
import { ListNode, buildList, listToArray } from './buildLinkedList.js'
/**
 * 206. Reverse Linked List
 * @param {ListNode} head
 * @return {ListNode}
 */
var reverseList = function(head) {
    if (head === null) { return head; }
    let prev = null;
    let current = head;
    while (current !== null) {
        let next = current.next;
        current.next = prev;
        prev = current
        current = next;
    }
    return prev;
};
const head = buildList([1,2,3,4,5]); // Expect [5,4,3,2,1]
//const head = buildList([1,2]); // Expect [2,1]
//const head = buildList([]); // Expect []
console.log(listToArray(reverseList(head)));
