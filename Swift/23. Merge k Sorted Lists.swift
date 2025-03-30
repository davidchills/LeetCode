/*
You are given an array of k linked-lists lists, each linked-list is sorted in ascending order.
Merge all the linked-lists into one sorted linked-list and return it.
    
23. Merge k Sorted Lists    
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
    func mergeKLists(_ lists: [ListNode?]) -> ListNode? {
        guard !lists.isEmpty else { return nil }
        let n = lists.count
        var lists = lists
        var interval = 1
        
        while interval < n {
            var i = 0
            while i + interval < n {
                lists[i] = mergeTwoLists(lists[i], lists[i + interval])
                i += interval * 2
            }
            interval *= 2
        }
        return lists[0]
    }
    
    
    private func mergeTwoLists(_ l1: ListNode?, _ l2: ListNode?) -> ListNode? {
        let dummy = ListNode(-1)
        var cur: ListNode? = dummy
        var l1 = l1
        var l2 = l2
        
        while l1 != nil || l2 != nil {
            if let l1Val = l1?.val, let l2Val = l2?.val {
                if l1Val < l2Val {
                    cur?.next = l1
                    l1 = l1?.next
                } 
                else {
                    cur?.next = l2
                    l2 = l2?.next
                }
                
            } 
            else if l1 != nil {
                cur?.next = l1
                l1 = l1?.next
            } 
            else if l2 != nil {
                cur?.next = l2
                l2 = l2?.next
            }
            cur = cur?.next
        }
        
        return dummy.next
    }
}
let list1: [ListNode?] = [buildList([1,4,5]), buildList([1,3,4]), buildList([2,6])];
let list2: [ListNode?] = [];
let list3: [ListNode?] = [buildList([])];
let solution = Solution()
print(listToArray(solution.mergeKLists(list1))) // Expect [1,1,2,3,4,4,5,6]
print(listToArray(solution.mergeKLists(list2)))  // Expect []
print(listToArray(solution.mergeKLists(list3)))  // Expect []