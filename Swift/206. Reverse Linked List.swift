/*
Given the head of a singly linked list, reverse the list, and return the reversed list.
    
206. Reverse Linked List    
*/
public class ListNode {
    public var val: Int
    public var next: ListNode?
    public init() { self.val = 0; self.next = nil; }
    public init(_ val: Int) { self.val = val; self.next = nil; }
    public init(_ val: Int, _ next: ListNode?) { self.val = val; self.next = next; }
}

public func buildList(_ arr: [Int]) -> ListNode? {
    if arr.isEmpty { return nil }
    let n = arr.count
    let root = ListNode(arr[0])
    var current = root
    
    for i in 1..<n {
        current.next = ListNode(arr[i])
        current = current.next!
    }
    return root    
}

public func listToArray(_ head: ListNode?) -> [Int] {
    var arr: [Int] = []
    var current = head
    
    while let node = current {
        arr.append(node.val)
        current = node.next
    }
    return arr
}

class Solution {
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
}

let solution = Solution()
if let linkedList = buildList([1, 2, 3, 4, 5]) {
    let reversedList = solution.reverseList(linkedList)
    print(listToArray(reversedList)) // Expect: [5, 4, 3, 2, 1]
} 
else {
    print("Empty list")
}

if let linkedList = buildList([1, 2]) {
    let reversedList = solution.reverseList(linkedList)
    print(listToArray(reversedList)) // Expect: [2, 1]
} 
else {
    print("Empty list")
}

if let linkedList = buildList([]) {
    let reversedList = solution.reverseList(linkedList)
    print(listToArray(reversedList)) // This won’t execute as the list is empty
} 
else {
    print("Empty list") // Expect: "Empty list"
}
