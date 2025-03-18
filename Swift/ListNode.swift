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
