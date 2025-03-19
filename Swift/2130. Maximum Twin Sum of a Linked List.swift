/*
In a linked list of size n, where n is even, the ith node (0-indexed) of the linked list is known as the twin of the (n-1-i)th node, 
    if 0 <= i <= (n / 2) - 1.
For example, if n = 4, then node 0 is the twin of node 3, and node 1 is the twin of node 2. These are the only nodes with twins for n = 4.
The twin sum is defined as the sum of a node and its twin.
Given the head of a linked list with even length, return the maximum twin sum of the linked list.
    
2130. Maximum Twin Sum of a Linked List    
*/
public class ListNode {
    public var val: Int
    public var next: ListNode?
    
    public init(_ val: Int, _ next: ListNode? = nil) {
        self.val = val
        self.next = next
    }
}

func buildList(_ arr: [Int]) -> ListNode? {
    if arr.isEmpty { return nil }
    
    let root = ListNode(arr[0])
    var current = root
    
    for i in 1..<arr.count {
        current.next = ListNode(arr[i])
        current = current.next!
    }
    
    return root
}

func reverseList(_ head: ListNode?) -> ListNode? {
    var prev: ListNode? = nil
    var current = head
    
    while let node = current {
        let next = node.next
        node.next = prev
        prev = node
        current = next
    }
    
    return prev
}

class Solution {
    func pairSum(_ head: ListNode?) -> Int {
        if head == nil || head?.next == nil { return 0 }
    
        var slow: ListNode? = head
        var fast: ListNode? = head
    
        while fast != nil && fast?.next != nil {
            slow = slow?.next
            fast = fast?.next?.next
        }
    
        var secondHalf: ListNode? = reverseList(slow)
        var firstHalf: ListNode? = head
        var maxSum = 0
    
        while secondHalf != nil {
            maxSum = max(maxSum, (firstHalf?.val ?? 0) + (secondHalf?.val ?? 0))
            firstHalf = firstHalf?.next
            secondHalf = secondHalf?.next
        }
    
        return maxSum        
    }
}
// Test Cases
let solution = Solution()
if let head = buildList([5, 4, 2, 1]) {
    print(solution.pairSum(head)) // Expect 6
}

if let head = buildList([4, 2, 2, 3]) {
    print(solution.pairSum(head)) // Expect 7
}

if let head = buildList([1, 100000]) {
    print(solution.pairSum(head)) // Expect 100001
}
