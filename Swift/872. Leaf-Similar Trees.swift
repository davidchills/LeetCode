/*
Consider all the leaves of a binary tree, from left to right order, the values of those leaves form a leaf value sequence.
    
872. Leaf-Similar Trees    
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
    func leafSimilar(_ root1: TreeNode?, _ root2: TreeNode?) -> Bool {
        return getLeafSequence(root1) == getLeafSequence(root2)
    }
    
    private func getLeafSequence(_ node: TreeNode?) -> [Int] {
        var leaves: [Int] = []
        dfs(node, &leaves)
        return leaves
    }  
    
    private func dfs(_ node: TreeNode?, _ leaves: inout [Int]) {
        guard let node = node else { return }
        
        if node.left == nil && node.right == nil {
            leaves.append(node.val)
        }
        
        dfs(node.left, &leaves)
        dfs(node.right, &leaves)
    }    
}


let solution = Solution()
if let root1 = buildTree([3,5,1,6,2,9,8,nil,nil,7,4]),
   let root2 = buildTree([3,5,1,6,7,4,2,nil,nil,nil,nil,nil,nil,9,8]) {
    print(solution.leafSimilar(root1, root2)) // Expect true
}

if let root1 = buildTree([1,2,3]),
   let root2 = buildTree([1,3,2]) {
    print(solution.leafSimilar(root1, root2)) // Expect false
}

if let root1 = buildTree([3,5,1,6,2,9,8,nil,nil,7,14]),
   let root2 = buildTree([3,5,1,6,71,4,2,nil,nil,nil,nil,nil,nil,9,8]) {
    print(solution.leafSimilar(root1, root2)) // Expect false
}
