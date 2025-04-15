/*
DESCRIPTION
    
2462. Total Cost to Hire K Workers    
*/
struct Heap<T> {
    var elements = [T]()
    let priority: (T, T) -> Bool

    init(priority: @escaping (T, T) -> Bool) {
        self.priority = priority
    }

    var count: Int { elements.count }
    var isEmpty: Bool { elements.isEmpty }
    func peek() -> T? { elements.first }

    mutating func insert(_ value: T) {
        elements.append(value)
        siftUp(from: elements.count - 1)
    }

    mutating func remove() -> T? {
        guard !elements.isEmpty else { return nil }
        if elements.count == 1 {
            return elements.removeFirst()
        } 
        else {
            let value = elements[0]
            elements[0] = elements.removeLast()
            siftDown(from: 0)
            return value
        }
    }

    private mutating func siftUp(from index: Int) {
        var child = index
        var parent = (child - 1) / 2
        while child > 0 && priority(elements[child], elements[parent]) {
            elements.swapAt(child, parent)
            child = parent
            parent = (child - 1) / 2
        }
    }

    private mutating func siftDown(from index: Int) {
        var parent = index
        while true {
            let left = 2 * parent + 1
            let right = 2 * parent + 2
            var candidate = parent

            if left < elements.count && priority(elements[left], elements[candidate]) {
                candidate = left
            }
            if right < elements.count && priority(elements[right], elements[candidate]) {
                candidate = right
            }

            if candidate == parent { break }
            elements.swapAt(parent, candidate)
            parent = candidate
        }
    }
}

class Solution {
    func totalCost(_ costs: [Int], _ k: Int, _ candidates: Int) -> Int {
        var totalCost = 0
        var left = 0
        var right = costs.count - 1

        var leftHeap = Heap<(Int, Int)> { $0.0 < $1.0 || ($0.0 == $1.0 && $0.1 < $1.1) }
        var rightHeap = Heap<(Int, Int)> { $0.0 < $1.0 || ($0.0 == $1.0 && $0.1 < $1.1) }

        while left <= right && leftHeap.count < candidates {
            leftHeap.insert((costs[left], left))
            left += 1
        }
        while right >= left && rightHeap.count < candidates {
            rightHeap.insert((costs[right], right))
            right -= 1
        }

        for _ in 0..<k {
            let pickLeft = leftHeap.peek() ?? (Int.max, Int.max)
            let pickRight = rightHeap.peek() ?? (Int.max, Int.max)

            if pickLeft <= pickRight {
                totalCost += pickLeft.0
                _ = leftHeap.remove()
                if left <= right {
                    leftHeap.insert((costs[left], left))
                    left += 1
                }
            } 
            else {
                totalCost += pickRight.0
                _ = rightHeap.remove()
                if left <= right {
                    rightHeap.insert((costs[right], right))
                    right -= 1
                }
            }
        }

        return totalCost      
    }
}
let solution = Solution()
print(solution.totalCost([17,12,10,2,7,2,11,20,8], 3, 4)) // Expect 11
print(solution.totalCost([1,2,4,1], 3, 3))  // Expect 4