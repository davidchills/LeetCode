/*
Given the head of a linked list, return the list after sorting it in ascending order.
*/
import { ListNode, buildList, listToArray } from './buildLinkedList.js'
/**
 * 148. Sort List
 * @param {ListNode} head
 * @return {ListNode}
 */
var sortList = function(head) {
    if (!head || !head.next) { return head; }
    function getMid (head) {
        let slow = head;
        let fast = head.next;
        
        while (fast && fast.next) {
            slow = slow.next;
            fast = fast.next.next;
        }
        return slow;
    }
    function merge (l1, l2) {
        const dummy = new ListNode();
        let tail = dummy;
        
        while (l1 && l2) {
            if (l1.val < l2.val) {
                tail.next = l1;
                l1 = l1.next;
            }
            else {
                tail.next = l2;
                l2 = l2.next;
            }
            tail = tail.next;
        }
        if (l1) { tail.next = l1; }
        else { tail.next = l2; }
        
        return dummy.next;    
    }
    const mid = getMid(head);
    const right = sortList(mid.next);
    mid.next = null;
    const left = sortList(head);
    
    return merge(left, right);
};

const head1 = buildList([4,2,1,3]); // Expect [1,2,3,4]
const head2 = buildList([-1,5,3,4,0]); // Expect [-1,0,3,4,5]
const head3 = buildList([]); // Expect []

console.log(listToArray(sortList(head1)));
console.log(listToArray(sortList(head2)));
console.log(listToArray(sortList(head3)));
