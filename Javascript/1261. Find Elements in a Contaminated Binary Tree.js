/*
Given a binary tree with the following rules:
root.val == 0
For any treeNode:
If treeNode.val has a value x and treeNode.left != null, then treeNode.left.val == 2 * x + 1
If treeNode.val has a value x and treeNode.right != null, then treeNode.right.val == 2 * x + 2
Now the binary tree is contaminated, which means all treeNode.val have been changed to -1.

Implement the FindElements class:

FindElements(TreeNode* root) Initializes the object with a contaminated binary tree and recovers it.
bool find(int target) Returns true if the target value exists in the recovered binary tree.
*/
/**
 * Definition for a binary tree node.
 */
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}

function createBinaryTree(arr) {
    if (!arr.length) return null;
    let nodes = arr.map(val => (val === null ? null : new TreeNode(val)));
    let root = nodes[0];
    let queue = [root];
    let i = 1;

    while (queue.length && i < nodes.length) {
        let node = queue.shift();
        if (node) {
            if (i < nodes.length && nodes[i] !== null) {
                node.left = nodes[i];
                queue.push(nodes[i]);
            }
            i++;
            if (i < nodes.length && nodes[i] !== null) {
                node.right = nodes[i];
                queue.push(nodes[i]);
            }
            i++;
        }
    }
    return root;
}

/**
 * @param {TreeNode} root
 */
var FindElements = function(root) {
    this.values = new Set();
    this.recover(root, 0);    
};


/** 
 * @param {number} target
 * @return {boolean}
 */
FindElements.prototype.find = function(target) {
    return this.values.has(target);
};

FindElements.prototype.recover = function(node, val) {
    if (!node) return;
    node.val = val;
    this.values.add(val);
    this.recover(node.left, 2 * val + 1);
    this.recover(node.right, 2 * val + 2);
};
/*
const root = createBinaryTree([-1,null,-1]);
const c = new FindElements(root);
console.log(c.find(1)) // Expect false
console.log(c.find(2)) // Expect true
*/
/*
const root = createBinaryTree([-1,-1,-1,-1,-1]);
const c = new FindElements(root);
console.log(c.find(1)) // Expect true
console.log(c.find(3)) // Expect true
console.log(c.find(5)) // Expect false
*/

const root = createBinaryTree([-1,null,-1,-1,null,-1]);
const c = new FindElements(root);
console.log(c.find(2)) // Expect true
console.log(c.find(3)) // Expect false
console.log(c.find(4)) // Expect false
console.log(c.find(5)) // Expect true

/** 
 * Your FindElements object will be instantiated and called as such:
 * var obj = new FindElements(root)
 * var param_1 = obj.find(target)
 */