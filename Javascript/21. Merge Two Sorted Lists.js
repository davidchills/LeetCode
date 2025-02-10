
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
 * 21. Merge Two Sorted Lists
 * @param {ListNode} list1
 * @param {ListNode} list2
 * @return {ListNode}
 */
var mergeTwoLists = function(list1, list2) {
    /*
    const dummy = new ListNode();
    let current = dummy;
    
    while (list1 !== null && list2 !== null) {
        if (list1.val <= list2.val) {
            current.next = list1;
            list1 = list1.next;
        }
        else {
            current.next = list2;
            list2 = list2.next;
        }
        current = current.next;
    }
    current.next = (list1 !== null) ? list1 : list2;
    
    return dummy.next;
    */
    // Using recurrsion
    if (list1 === null) { return list2; }
    if (list2 === null) { return list1; }
    if (list1.val < list2.val) {
        list1.next = mergeTwoLists(list1.next, list2);
        return list1;
    }
    else {
        list2.next = mergeTwoLists(list2.next, list1);
        return list2;
    }
};

let list1 = createLinkedList([1, 2, 4]);
let list2 = createLinkedList([1, 3, 5]);
console.log(printLinkedList(mergeTwoLists(list1, list2)));



