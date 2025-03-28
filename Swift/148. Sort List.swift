/*
Given the head of a linked list, return the list after sorting it in ascending order.
    
148. Sort List    
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
    func sortList(_ head: ListNode?) -> ListNode? {
        guard let head = head, head.next != nil else {
            return head
        }

        let mid = getMid(head)
        let right = sortList(mid.next)
        mid.next = nil
        let left = sortList(head)

        return merge(left, right)
    }

    private func getMid(_ head: ListNode) -> ListNode {
        var slow: ListNode? = head
        var fast: ListNode? = head.next

        while let f = fast, let next = f.next {
            slow = slow?.next
            fast = next.next
        }

        return slow!
    }

    private func merge(_ l1: ListNode?, _ l2: ListNode?) -> ListNode? {
        let dummy = ListNode(0)
        var tail = dummy
        var l1 = l1
        var l2 = l2

        while let node1 = l1, let node2 = l2 {
            if node1.val < node2.val {
                tail.next = node1
                l1 = node1.next
            } 
            else {
                tail.next = node2
                l2 = node2.next
            }
            tail = tail.next!
        }

        tail.next = l1 ?? l2
        return dummy.next
    }
}
let head1 = buildList([4,2,1,3]); // Expect [1,2,3,4]
let head2 = buildList([-1,5,3,4,0]); // Expect [-1,0,3,4,5]
let head3 = buildList([]); // Expect []

let solution = Solution()
print(listToArray(solution.sortList(head1)))
print(listToArray(solution.sortList(head2)))
print(listToArray(solution.sortList(head3)))