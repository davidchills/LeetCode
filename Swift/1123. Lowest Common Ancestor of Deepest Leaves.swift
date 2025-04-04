/*
Given the root of a binary tree, return the lowest common ancestor of its deepest leaves.
Recall that:
The node of a binary tree is a leaf if and only if it has no children
The depth of the root of the tree is 0. if the depth of a node is d, the depth of each of its children is d + 1.
The lowest common ancestor of a set S of nodes, is the node A with the largest depth such that every node in S is in the subtree with root A.
    
1123. Lowest Common Ancestor of Deepest Leaves    
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

func printTree(_ root: TreeNode?) {
    if root == nil {
        print("Empty Tree")
        return
    }
    
    var queue: [TreeNode] = [root!]
    var levelValues: [Int] = []
    while !queue.isEmpty {
        let levelSize = queue.count
        for _ in 0..<levelSize {
            let node = queue.removeFirst()
            levelValues.append(node.val)
            if let left = node.left {
                queue.append(left)
            }
            if let right = node.right {
                queue.append(right)
            }
        }
    }
    print(levelValues)
}

class Solution {
    func lcaDeepestLeaves(_ root: TreeNode?) -> TreeNode? {
        func dfs(_ node: TreeNode?) -> (Int, TreeNode?) {
            guard let node = node else { return (0, nil) }
            let (leftDepth, leftNode) = dfs(node.left)
            let (rightDepth, rightNode) = dfs(node.right)
            if leftDepth == rightDepth {
                return (leftDepth + 1, node)
            }
            else if leftDepth > rightDepth {
                return (leftDepth + 1, leftNode)
            }
            else {
                return (rightDepth + 1, rightNode)
            }
        }
        return dfs(root).1
    }
}

let root1 = buildTree([3,5,1,6,2,0,8,nil,nil,7,4]) // Expect [2,7,4]
let root2 = buildTree([1]) // Expect [1]
let root3 = buildTree([0,1,3,nil,2]) // Expect [2]
let solution = Solution()
printTree(solution.lcaDeepestLeaves(root1))
printTree(solution.lcaDeepestLeaves(root2))
printTree(solution.lcaDeepestLeaves(root3))