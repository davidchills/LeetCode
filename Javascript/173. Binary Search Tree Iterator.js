/*
Implement the BSTIterator class that represents an iterator over the in-order traversal of a binary search tree (BST):
• BSTIterator(TreeNode root) Initializes an object of the BSTIterator class. 
    The root of the BST is given as part of the constructor. 
    The pointer should be initialized to a non-existent number smaller than any element in the BST.
• boolean hasNext() Returns true if there exists a number in the traversal to the right of the pointer, otherwise returns false.
• int next() Moves the pointer to the right, then returns the number at the pointer.
Notice that by initializing the pointer to a non-existent smallest number, the first call to next() will return the smallest element in the BST.
You may assume that next() calls will always be valid. That is, there will be at least a next number in the in-order traversal when next() is called.

*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
/**
 * 173. Binary Search Tree Iterator
 * @param {TreeNode} root
 */
var BSTIterator = function(root) {
    this.stack = []
    this.pushLeft(root);
};

/**
 * @return {number}
 */
BSTIterator.prototype.next = function() {
    node = this.stack.pop();
    this.pushLeft(node.right);
    return node.val;
};

/**
 * @return {boolean}
 */
BSTIterator.prototype.hasNext = function() {
    return this.stack.length > 0;
};

BSTIterator.prototype.pushLeft = function(node) {
    while (node !== null) {
        this.stack.push(node);
        node = node.left;
    }
};

const root = new TreeNode(7,
    new TreeNode(3, null, null), 
    new TreeNode(15, 
        new TreeNode(9, null, null),
        new TreeNode(20, null, null)
    )
);

const c = new BSTIterator(root);

console.log(c.next()); // Expect 3
console.log(c.next()); // Expect 7
console.log(c.hasNext()); // Expect true
console.log(c.next()); // Expect 9
console.log(c.hasNext()); // Expect true
console.log(c.next()); // Expect 15
console.log(c.hasNext()); // Expect true
console.log(c.next()); // Expect 20
console.log(c.hasNext()); // Expect false
