/*
A linked list of length n is given such that each node contains an additional random pointer, which could point to any node in the list, or null.

Construct a deep copy of the list. The deep copy should consist of exactly n brand new nodes, where each new node has its value set to the value of its corresponding original node. Both the next and random pointer of the new nodes should point to new nodes in the copied list such that the pointers in the original list and copied list represent the same list state. None of the pointers in the new list should point to nodes in the original list.

For example, if there are two nodes X and Y in the original list, where X.random --> Y, then for the corresponding two nodes x and y in the copied list, x.random --> y.

Return the head of the copied linked list.

The linked list is represented in the input/output as a list of n nodes. Each node is represented as a pair of [val, random_index] where:

val: an integer representing Node.val
random_index: the index of the node (range from 0 to n-1) that the random pointer points to, or null if it does not point to any node.
Your code will only be given the head of the original linked list.
*/
// Definition for singly-linked list.
function Node(val, next, random) {
    this.val = val;
    this.next = next;
    this.random = random;
}

function createLinkedList(arr) {
    if (arr.length === 0) { return null; }
    const nodes = [];
    
    arr.forEach((item) => {
        nodes.push(new Node(item[0], null, null));
    });

    arr.forEach((item, index) => {
        if (nodes[index+1]) {
            nodes[index].next = nodes[index+1];
        }
        nodes[index].random = (item[1] !== null) ? nodes[item[1]] :  null;
    });
    return nodes[0];
}

function printList(head) {
    const arr = [];
    while (head !== null) {
        let randomVal = (head.random) ? head.random.val : 'null';
        arr.push('['+head.val+','+randomVal+']');
        head = head.next;
    }
    console.log(arr.join(' -> '));
}
 
/**
 * 138. Copy List with Random Pointer
 * @param {_Node} head
 * @return {_Node}
 */
var copyRandomList = function(head) {
    if (!head) { return null; }

    let map = new Map();

    // First pass: create a copy of each node and store it in a map
    let current = head;
    while (current) {
        map.set(current, new Node(current.val, null, null));
        current = current.next;
    }

    // Second pass: assign next and random pointers
    current = head;
    while (current) {
        let copy = map.get(current);
        copy.next = map.get(current.next) || null;
        copy.random = map.get(current.random) || null;
        current = current.next;
    }

    return map.get(head);    
};

//let head = createLinkedList([[7,null],[13,0],[11,4],[10,2],[1,0]]); // Expect [[7,null],[13,0],[11,4],[10,2],[1,0]]
//let head = createLinkedList([[1,1],[2,1]]); // Expect [[1,1],[2,1]]
let head = createLinkedList([[3,null],[3,0],[3,null]]); // Expect [[3,null],[3,0],[3,null]] 

printList(copyRandomList(head));
//console.log(copyRandomList(head));



