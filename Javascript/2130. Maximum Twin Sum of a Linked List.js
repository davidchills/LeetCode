/*
In a linked list of size n, where n is even, the ith node (0-indexed) of the linked list is known as the twin of the (n-1-i)th node, 
    if 0 <= i <= (n / 2) - 1.
For example, if n = 4, then node 0 is the twin of node 3, and node 1 is the twin of node 2. These are the only nodes with twins for n = 4.
The twin sum is defined as the sum of a node and its twin.
Given the head of a linked list with even length, return the maximum twin sum of the linked list.
*/
/**
 * 2130. Maximum Twin Sum of a Linked List
 * @param {ListNode} head
 * @return {number}
 */
import { ListNode, buildList, listToArray } from './buildLinkedList.js'
var pairSum = function(head) {
    if (head === null || head.next === null) { return 0; }
    let slow = head;
    let fast = head;
    
    while (fast !== null && fast.next !== null) {
        slow = slow.next;
        fast = fast.next.next;
    }
    
    function reverseList (head) {
        let prev = null;
        while (head !== null) {
            const next = head.next;
            head.next = prev;
            prev = head;
            head = next;
        }
        return prev;
    }
    
    let secondHalf = reverseList(slow);
    let maxSum = 0;
    let firstHalf = head;
    
    while (secondHalf !== null) {
        maxSum = Math.max(maxSum, firstHalf.val + secondHalf.val);
        firstHalf = firstHalf.next;
        secondHalf = secondHalf.next
    }
    return maxSum;
};

//const head = buildList([5,4,2,1]); // Expect 6
//const head = buildList([4,2,2,3]); // Expect 7
const head = buildList([1,100000]); // Expect 100001
console.log(pairSum(head));
