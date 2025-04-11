/*
You are given two 0-indexed integer arrays nums1 and nums2 of equal length n and a positive integer k. 
You must choose a subsequence of indices from nums1 of length k.
For chosen indices i0, i1, ..., ik - 1, your score is defined as:
The sum of the selected elements from nums1 multiplied with the minimum of the selected elements from nums2.
It can defined simply as: (nums1[i0] + nums1[i1] +...+ nums1[ik - 1]) * min(nums2[i0] , nums2[i1], ... ,nums2[ik - 1]).
Return the maximum possible score.
A subsequence of indices of an array is a set that can be derived from the set {0, 1, ..., n-1} by deleting some or no elements.
    
2542. Maximum Subsequence Score    
*/
struct MinHeap {
    private var heap = [Int]()
    
    var count: Int {
        return heap.count
    }
    
    var isEmpty: Bool {
        return heap.isEmpty
    }
    
    // Return the smallest element without removing it
    var peek: Int? {
        return heap.first
    }
    
    mutating func push(_ element: Int) {
        heap.append(element)
        siftUp(from: heap.count - 1)
    }
    
    mutating func pop() -> Int? {
        guard !heap.isEmpty else { return nil }
        if heap.count == 1 {
            return heap.removeFirst()
        }
        let minValue = heap[0]
        heap[0] = heap.removeLast()
        siftDown(from: 0)
        return minValue
    }
    
    private mutating func siftUp(from index: Int) {
        var childIndex = index
        let child = heap[childIndex]
        var parentIndex = (childIndex - 1) / 2
        
        while childIndex > 0 && child < heap[parentIndex] {
            heap[childIndex] = heap[parentIndex]
            childIndex = parentIndex
            parentIndex = (childIndex - 1) / 2
        }
        heap[childIndex] = child
    }
    
    private mutating func siftDown(from index: Int) {
        var parentIndex = index
        let count = heap.count
        while true {
            let leftChildIdx = 2 * parentIndex + 1
            let rightChildIdx = 2 * parentIndex + 2
            var candidateIndex = parentIndex
            
            if leftChildIdx < count && heap[leftChildIdx] < heap[candidateIndex] {
                candidateIndex = leftChildIdx
            }
            if rightChildIdx < count && heap[rightChildIdx] < heap[candidateIndex] {
                candidateIndex = rightChildIdx
            }
            if candidateIndex == parentIndex {
                break
            }
            heap.swapAt(parentIndex, candidateIndex)
            parentIndex = candidateIndex
        }
    }
}

class Solution {
    func maxScore(_ nums1: [Int], _ nums2: [Int], _ k: Int) -> Int {
        let n = nums1.count        
        var heap = MinHeap()
        var sumNums1 = 0
        var maxScore = 0   
        // Pair the elements and sort by nums2 in descending order.
        var pairs = [(Int, Int)]()
        for i in 0..<n {
            pairs.append((nums1[i], nums2[i]))
        }
        pairs.sort { $0.1 > $1.1 }
        
        // Iterate over sorted pairs. For each pair, push the corresponding nums1 value.
        for (a, b) in pairs {
            heap.push(a)
            sumNums1 += a
            
            // If the heap size exceeds k, pop the smallest and adjust sum.
            if heap.count > k {
                if let removed = heap.pop() {
                    sumNums1 -= removed
                }
            }
            
            // When we have exactly k elements, update the maximum score.
            if heap.count == k {
                maxScore = max(maxScore, sumNums1 * b)
            }
        }
        return maxScore        
    }
}
let solution = Solution()
print(solution.maxScore([1,3,3,2], [2,1,3,4], 3)) // Expect 12
print(solution.maxScore([4,2,3,1,1], [7,5,10,9,6], 1))  // Expect 30