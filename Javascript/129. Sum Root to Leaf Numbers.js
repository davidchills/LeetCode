/*
You are given the root of a binary tree containing digits from 0 to 9 only.
Each root-to-leaf path in the tree represents a number.
For example, the root-to-leaf path 1 -> 2 -> 3 represents the number 123.
Return the total sum of all root-to-leaf numbers. Test cases are generated so that the answer will fit in a 32-bit integer.
A leaf node is a node with no children.
*/
function TreeNode(val, left, right) {
    this.val = (val===undefined ? 0 : val)
    this.left = (left===undefined ? null : left)
    this.right = (right===undefined ? null : right)
}
/**
 * 129. Sum Root to Leaf Numbers
 * @param {TreeNode} root
 * @return {number}
 */
var sumNumbers = function(root) {
    /*
    // DFS Recursive
    const dfs = function(node, currentSum) {
        if (node === null) { return 0; }
        // I know the () aren't needed because PEDMAS, but I like them.
        // * 10 to shift the number one decimal to the left before adding.
        currentSum = ((currentSum * 10) + node.val);
        if (node.left === null && node.right === null) {
            return currentSum;
        }
        let leftSum = dfs(node.left, currentSum);
        let rightSum = dfs(node.right, currentSum);
        return leftSum + rightSum;
    }
    return dfs(root, 0);
    */
    
    // BFS Iterative
    if (root === null) { return 0; }
    
    let sum = 0;
    let queue = [[root, 0]];
    
    while (queue.length > 0) {
        let [node, currentSum] = queue.shift();
        // I know the () aren't needed because PEDMAS, but I like them.
        // * 10 to shift the number one decimal to the left before adding.        
        currentSum = (currentSum * 10) + node.val;
        
        if (!node.left && !node.right) {
            sum += currentSum;
        }
        
        if (node.left) { queue.push([node.left, currentSum]); }
        if (node.right) { queue.push([node.right, currentSum]); }
    }
    
    return sum;
    
};

/*
const root = new TreeNode(1,
    new TreeNode(2, null, null),
    new TreeNode(3, null, null)
); // Expect 25
*/
const root = new TreeNode(4,
    new TreeNode(9, 
        new TreeNode(5, null, null),
        new TreeNode(1, null, null)
    ),
    new TreeNode(0, null, null)
); // Expect 1026

console.log(sumNumbers(root));
