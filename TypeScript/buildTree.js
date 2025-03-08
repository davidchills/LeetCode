// Define the TreeNode class with proper TypeScript types
var TreeNode = /** @class */ (function () {
    function TreeNode(val, left, right) {
        this.val = val !== null && val !== void 0 ? val : 0;
        this.left = left !== null && left !== void 0 ? left : null;
        this.right = right !== null && right !== void 0 ? right : null;
    }
    return TreeNode;
}());
export { TreeNode };
// Function to build a tree from an array representation
export function buildTree(arr) {
    var n = arr.length;
    if (n === 0 || arr[0] === null)
        return null;
    var root = new TreeNode(arr[0]);
    var queue = [root];
    var i = 1;
    while (i < n) {
        var node = queue.shift();
        if (i < n && arr[i] !== null) {
            node.left = new TreeNode(arr[i]);
            queue.push(node.left);
        }
        i++;
        if (i < n && arr[i] !== null) {
            node.right = new TreeNode(arr[i]);
            queue.push(node.right);
        }
        i++;
    }
    return root;
}
