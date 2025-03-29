/*
You are given the root of a binary tree.
A ZigZag path for a binary tree is defined as follow:
Choose any node in the binary tree and a direction (right or left).
If the current direction is right, move to the right child of the current node; otherwise, move to the left child.
Change the direction from right to left or from left to right.
Repeat the second and third steps until you can't move in the tree.
Zigzag length is defined as the number of nodes visited - 1. (A single node has a length of 0).
Return the longest ZigZag path contained in that tree.
    
1372. Longest ZigZag Path in a Binary Tree    
*/
public class TreeNode {
    public var val: Int
    public var left: TreeNode?
    public var right: TreeNode?    
    public init() { self.val = 0; self.left = nil; self.right = nil }
    public init(_ val: Int) { self.val = val; self.left = nil; self.right = nil }
    public init(_ val: Int, _ left: TreeNode?, _ right: TreeNode?) {
        self.val = val
        self.left = left
        self.right = right
    }
}

func buildTree(_ arr: [Int?]) -> TreeNode? {
    guard !arr.isEmpty, let first = arr[0] else { return nil }
    let root = TreeNode(first)
    var queue: [TreeNode] = [root]
    var i = 1
    while i < arr.count {
        let node = queue.removeFirst()
        
        if i < arr.count, let leftVal = arr[i] {
            node.left = TreeNode(leftVal)
            queue.append(node.left!)
        }
        i += 1
        if i < arr.count, let rightVal = arr[i] {
            node.right = TreeNode(rightVal)
            queue.append(node.right!)
        }
        i += 1
    }
    return root
}

class Solution {
    func longestZigZag(_ root: TreeNode?) -> Int {
        var maxLength = 0

        @discardableResult
        func dfs(_ node: TreeNode?) -> (Int, Int) {
            guard let node = node else { return (-1, -1) }
            let left = dfs(node.left)
            let right = dfs(node.right)
            let leftLength = left.1 + 1
            let rightLength = right.0 + 1
            maxLength = max(maxLength, leftLength, rightLength)
            return (leftLength, rightLength)
        }
        dfs(root)
        return maxLength
    }
}
let root1 = buildTree([1,nil,1,1,1,nil,nil,1,1,nil,1,nil,nil,nil,1])
let root2 = buildTree([1,1,1,nil,1,nil,nil,1,1,nil,1])
let root3 = buildTree([1])
let solution = Solution()
print(solution.longestZigZag(root1)) // Expect 3
print(solution.longestZigZag(root2))  // Expect 4
print(solution.longestZigZag(root3))  // Expect 0