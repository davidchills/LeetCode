// 83. Remove Duplicates from Sorted List

/* Definition for singly-linked list. */
function ListNode(val, next) {
    this.val = (val===undefined ? 0 : val);
    this.next = (next===undefined ? null : next);
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

function printLinkedList(head) {
    const result = [];
    while (head !== null) {
        result.push(head.val);
        head = head.next;
    }
    return result.join(' -> ');
    //echo implode(" -> ", $result) . "\n";
}

/**
 * 83. Remove Duplicates from Sorted List
 * @param {ListNode} head
 * @return {ListNode}
 */
var deleteDuplicates = function(head) {
    let current = head;
    
    while (current !== null && current.next !== null) {
        if (current.val === current.next.val) {
            current.next = current.next.next;
        }
        else {
            current = current.next;
        }
    }
    return head;
};

//let head = createLinkedList([1,1,2,3,3]); // Expect [1,2,3]
let head = createLinkedList([1, 1, 1, 2, 2]); // Expect [1,2]
console.log(printLinkedList(deleteDuplicates(head)));



