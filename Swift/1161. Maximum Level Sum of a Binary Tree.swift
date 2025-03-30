/*
Given the root of a binary tree, the level of its root is 1, the level of its children is 2, and so on.
Return the smallest level x such that the sum of all the values of nodes at level x is maximal.
    
1161. Maximum Level Sum of a Binary Tree    
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
    func maxLevelSum(_ root: TreeNode?) -> Int {
        guard let root = root else { return 0 }
        var queue: [TreeNode] = [root]
        var level = 1
        var maxSum = root.val
        var maxLevel = 1
        
        while !queue.isEmpty {
            let levelSize = queue.count
            var sum = 0
            for _ in 0..<levelSize {
                let node = queue.removeFirst()
                sum += node.val
                if let left = node.left {
                    queue.append(left)
                }
                if let right = node.right {
                    queue.append(right)
                }
            }
            if sum > maxSum {
                maxSum = sum
                maxLevel = level
            }
            level += 1
        }
        return maxLevel
    }
}

let root1 = buildTree([1,7,0,7,-8,nil,nil]) // Expect 2
let root2 = buildTree([989,nil,10250,98693,-89388,nil,nil,nil,-32127])  // Expect 2
let root3 = buildTree([-100,-200,-300,-20,-5,-10,nil])  // Expect 3

let solution = Solution()
print(solution.maxLevelSum(root1))
print(solution.maxLevelSum(root2))
print(solution.maxLevelSum(root3))