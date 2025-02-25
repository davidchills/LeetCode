/*
Given a binary tree

struct Node {
  int val;
  Node *left;
  Node *right;
  Node *next;
}
Populate each next pointer to point to its next right node. If there is no next right node, the next pointer should be set to NULL.

Initially, all next pointers are set to NULL.
*/
function Node(val, left, right, next) {
    this.val = val;
    this.left = left || null;
    this.right = right || null;
    this.next = next || null;
}

function printNextPointers(root) {
    const result = [];
    while (root !== null) {
        const level = [];
        let curr = root;
        while (curr !== null) {
            level.push(curr.val);
            curr = curr.next;
        }
        result.push(level.join(' -> ')+" #");
        root = root.left ? root.left : root.right;
    }
    console.log(result.join("\n"));
}
/**
 * 117. Populating Next Right Pointers in Each Node II
 * @param {_Node} root
 * @return {_Node}
 */
var connect = function(root) {
    if (!root) { return null; }
    
    let queue = [root];
    
    while (queue.length > 0) {
        let size = queue.length;
        
        for (let i = 0; i < size; i++) {
            let node = queue.shift();
            if (i < size - 1) {
                node.next = queue[0];
            }
            if (node.left) { queue.push(node.left); }
            if (node.right) { queue.push(node.right); }
        }
    }
    return root;    
};
const root = new Node(1, new Node(2, new Node(4), new Node(5)), new Node(3, null, new Node(7))); // Expected [1,#,2,3,#,4,5,7,#]
printNextPointers(connect(root));