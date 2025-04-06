/*
You are given two integer arrays nums1 and nums2 sorted in non-decreasing order and an integer k.
Define a pair (u, v) which consists of one element from the first array and one element from the second array.
Return the k pairs (u1, v1), (u2, v2), ..., (uk, vk) with the smallest sums.
    
373. Find K Pairs with Smallest Sums    
*/
class Solution {
    func kSmallestPairs(_ nums1: [Int], _ nums2: [Int], _ k: Int) -> [[Int]] {
        var result: [[Int]] = []
        if nums1.isEmpty || nums2.isEmpty || k == 0 {
            return result
        }   
        
        struct Pair {
            let i: Int
            let j: Int
            let sum: Int
        }
        
        struct PriorityQueue<T> {
            private var heap: [T] = []
            private let areSorted: (T, T) -> Bool
            
            init(sort: @escaping (T, T) -> Bool) {
                self.areSorted = sort
            }
            
            var isEmpty: Bool { heap.isEmpty }
            var count: Int { heap.count }
            
            mutating func push(_ element: T) {
                heap.append(element)
                siftUp(heap.count - 1)
            }
            
            mutating func pop() -> T? {
                if heap.isEmpty { return nil }
                if heap.count == 1 { return heap.removeFirst() }
                let first = heap[0]
                heap[0] = heap.removeLast()
                siftDown(0)
                return first
            }
            
            private mutating func siftUp(_ index: Int) {
                var child = index
                var parent = (child - 1) / 2
                while child > 0 && areSorted(heap[child], heap[parent]) {
                    heap.swapAt(child, parent)
                    child = parent
                    parent = (child - 1) / 2
                }
            }
            
            private mutating func siftDown(_ index: Int) {
                var parent = index
                while true {
                    let left = 2 * parent + 1
                    let right = 2 * parent + 2
                    var candidate = parent
                    if left < heap.count && areSorted(heap[left], heap[candidate]) {
                        candidate = left
                    }
                    if right < heap.count && areSorted(heap[right], heap[candidate]) {
                        candidate = right
                    }
                    if candidate == parent { break }
                    heap.swapAt(parent, candidate)
                    parent = candidate
                }
            }
        }
        
        var pq = PriorityQueue<Pair>(sort: { $0.sum < $1.sum })
        
        for i in 0..<nums1.count {
            let pair = Pair(i: i, j: 0, sum: nums1[i] + nums2[0])
            pq.push(pair)
        }
        
        while result.count < k && !pq.isEmpty {
            guard let pair = pq.pop() else { break }
            result.append([nums1[pair.i], nums2[pair.j]])
            if pair.j + 1 < nums2.count {
                let newPair = Pair(i: pair.i, j: pair.j + 1, sum: nums1[pair.i] + nums2[pair.j + 1])
                pq.push(newPair)
            }
        }
        return result        
    }
}
let solution = Solution()
print(solution.kSmallestPairs([1,7,11], [2,4,6], 3)) // Expect [[1,2],[1,4],[1,6]]
print(solution.kSmallestPairs([1,1,2], [1,2,3], 2))  // Expect [[1,1],[1,1]]