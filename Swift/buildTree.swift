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