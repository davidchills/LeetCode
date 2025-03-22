/*
Given the root of a binary tree and an integer targetSum, return the number of paths where the sum of the values along the path equals targetSum.
The path does not need to start or end at the root or a leaf, but it must go downwards (i.e., traveling only from parent nodes to child nodes).
    
437. Path Sum III    
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
    func pathSum(_ root: TreeNode?, _ targetSum: Int) -> Int {
        if root == nil { return 0 }
        var prefixSum: [Int: Int] = [0:1]
        return dfs(root, 0, targetSum, &prefixSum)
    }
    
    private func dfs(_ node: TreeNode?, _ currentSum: Int, _ targetSum: Int, _ prefixSum: inout [Int: Int]) -> Int {
        guard let node = node else { return 0 }
        let currentSum = currentSum + node.val
        var paths = prefixSum[currentSum - targetSum, default: 0]
        prefixSum[currentSum, default: 0] += 1
        paths += dfs(node.left, currentSum, targetSum, &prefixSum)
        paths += dfs(node.right, currentSum, targetSum, &prefixSum)
        prefixSum[currentSum, default: 0] -= 1
        return paths;
    }
}
let root1 = buildTree([10,5,-3,3,2,nil,11,3,-2,nil,1])
let targetSum1 = 8 // Expect 3

let root2 = buildTree([5,4,8,11,nil,13,4,7,2,nil,nil,5,1])
let targetSum2 = 22 // Expect 3
 
let solution = Solution()
print(solution.pathSum(root1, targetSum1)) // Expect 5
print(solution.pathSum(root2, targetSum2))  // Expect 0