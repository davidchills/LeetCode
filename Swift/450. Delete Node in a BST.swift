/*
Given a root node reference of a BST and a key, delete the node with the given key in the BST. 
    Return the root node reference (possibly updated) of the BST.
Basically, the deletion can be divided into two stages:
Search for a node to remove.
If the node is found, delete the node.
    
450. Delete Node in a BST    
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
    func deleteNode(_ root: TreeNode?, _ key: Int) -> TreeNode? {
        guard let root = root else { return nil }
        if key < root.val {
            root.left = deleteNode(root.left, key)
        }
        else if key > root.val {
            root.right = deleteNode(root.right, key)
        } 
        else {
            if root.left == nil {
                return root.right
            }
            if root.right == nil {
                return root.left
            }
            if let minNode = getMin(root.right) {
                root.val = minNode.val
                root.right = deleteNode(root.right, minNode.val)
            }
        }
        
        func getMin(_ node: TreeNode?) -> TreeNode? {
            var current = node
            while let next = current?.left {
                current = next
            }
            return current
        }
        
        return root
    }
}

let root1 = buildTree([5,3,6,2,4,nil,7])
let root2 = buildTree([5,3,6,2,4,nil,7])
let root3 = buildTree([])
let solution = Solution()
printTree(solution.deleteNode(root1, 3)) // Expect [5,4,6,2,nil,nil,7]
printTree(solution.deleteNode(root2, 0))  // Expect [5,3,6,2,4,nil,7]
printTree(solution.deleteNode(root3, 0))  // Expect []