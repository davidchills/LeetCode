/*
You have a set which contains all positive integers [1, 2, 3, 4, 5, ...].
Implement the SmallestInfiniteSet class:
SmallestInfiniteSet() Initializes the SmallestInfiniteSet object to contain all positive integers.
int popSmallest() Removes and returns the smallest integer contained in the infinite set.
void addBack(int num) Adds a positive integer num back into the infinite set, if it is not already in the infinite set.
    
2336. Smallest Number in Infinite Set    
*/
struct Heap<T> {
    var elements: [T]
    let sort: (T, T) -> Bool

    var isEmpty: Bool {
        return elements.isEmpty
    }
    var count: Int {
        return elements.count
    }

    // Initialize with an optional array of elements.
    init(sort: @escaping (T, T) -> Bool, elements: [T] = []) {
        self.sort = sort
        self.elements = elements
        // Heapify process for initial elements.
        if !self.elements.isEmpty {
            for i in stride(from: (self.elements.count - 2) / 2, through: 0, by: -1) {
                siftDown(from: i)
            }
        }
    }

    mutating func insert(_ value: T) {
        elements.append(value)
        siftUp(from: elements.count - 1)
    }

    mutating func remove() -> T? {
        guard !elements.isEmpty else { return nil }
        if elements.count == 1 {
            return elements.removeFirst()
        }
        let value = elements[0]
        elements[0] = elements.removeLast()
        siftDown(from: 0)
        return value
    }

    private mutating func siftUp(from index: Int) {
        var childIndex = index
        let child = elements[childIndex]
        var parentIndex = (childIndex - 1) / 2
        while childIndex > 0 && sort(child, elements[parentIndex]) {
            elements[childIndex] = elements[parentIndex]
            childIndex = parentIndex
            parentIndex = (childIndex - 1) / 2
        }
        elements[childIndex] = child
    }

    private mutating func siftDown(from index: Int) {
        var parentIndex = index
        let count = elements.count
        while true {
            let leftChildIndex = 2 * parentIndex + 1
            let rightChildIndex = 2 * parentIndex + 2
            var candidate = parentIndex
            
            if leftChildIndex < count && sort(elements[leftChildIndex], elements[candidate]) {
                candidate = leftChildIndex
            }
            if rightChildIndex < count && sort(elements[rightChildIndex], elements[candidate]) {
                candidate = rightChildIndex
            }
            if candidate == parentIndex { break }
            elements.swapAt(parentIndex, candidate)
            parentIndex = candidate
        }
    }
}
class SmallestInfiniteSet {
    
    private var curr: Int       // The next new number (never popped)
    private var addedHeap: Heap<Int>  // Min-heap to store numbers added back 
    private var addedSet: Set<Int>    // Set to ensure uniqueness in the heap
    
    init() {
        self.curr = 1
        self.addedHeap = Heap(sort: <)
        self.addedSet = Set<Int>()        
    }
    
    func popSmallest() -> Int {
        if !addedHeap.isEmpty {
            if let smallest = addedHeap.remove() {
                addedSet.remove(smallest)
                return smallest
            }
        }
        // Otherwise, return the next new number and increment curr.
        let result = curr
        curr += 1
        return result        
    }
    
    func addBack(_ num: Int) {
        if num < curr && !addedSet.contains(num) {
            addedHeap.insert(num)
            addedSet.insert(num)
        }        
    }
}
let obj = SmallestInfiniteSet()
obj.addBack(2)
print(obj.popSmallest())  // Expect 1
print(obj.popSmallest())  // Expect 2
print(obj.popSmallest())  // Expect 3
obj.addBack(1)
print(obj.popSmallest())  // Expect 1
print(obj.popSmallest())  // Expect 4
print(obj.popSmallest())  // Expect 5