<?php
/*
In a linked list of size n, where n is even, the ith node (0-indexed) of the linked list is known as the twin of the (n-1-i)th node, 
    if 0 <= i <= (n / 2) - 1.
For example, if n = 4, then node 0 is the twin of node 3, and node 1 is the twin of node 2. These are the only nodes with twins for n = 4.
The twin sum is defined as the sum of a node and its twin.
Given the head of a linked list with even length, return the maximum twin sum of the linked list.
*/
include("./BuildLinkedLists.php");
class Solution {

    /**
     * 2130. Maximum Twin Sum of a Linked List
     * @param ListNode $head
     * @return Integer
     */
    public function pairSum(?ListNode $head): int {
        if ($head === null || $head->next === null) { return 0; }
        $slow = $head;
        $fast = $head;
        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $secondHalf = $this->reverseList($slow);
        $maxSum = 0;
        $firstHalf = $head;

        while ($secondHalf !== null) {
            $maxSum = max($maxSum, $firstHalf->val + $secondHalf->val);
            $firstHalf = $firstHalf->next;
            $secondHalf = $secondHalf->next;
        }
        return $maxSum;        
    }
    
    /**
     * Reverse a linked list.
     * @param ListNode $head
     * @return ListNode
     */
    private function reverseList(?ListNode $head): ?ListNode  {
        $prev = null;
        while ($head !== null) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $next;
        }
        return $prev;
    }    
}
$head = createLinkedList([5,4,2,1]); // Expect 6
//$head = createLinkedList([4,2,2,3]); // Expect 7
//$head = createLinkedList([1,100000]); // Expect 100001
$c = new Solution;
print_r($c->pairSum($head));


?>