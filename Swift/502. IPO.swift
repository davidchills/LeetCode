/*
Suppose LeetCode will start its IPO soon. In order to sell a good price of its shares to Venture Capital, 
    LeetCode would like to work on some projects to increase its capital before the IPO. Since it has limited resources, 
    it can only finish at most k distinct projects before the IPO. 
    Help LeetCode design the best way to maximize its total capital after finishing at most k distinct projects.
You are given n projects where the ith project has a pure profit profits[i] and a minimum capital of capital[i] is needed to start it.
Initially, you have w capital. When you finish a project, you will obtain its pure profit and the profit will be added to your total capital.
Pick a list of at most k distinct projects from given projects to maximize your final capital, and return the final maximized capital.
The answer is guaranteed to fit in a 32-bit signed integer.
    
502. IPO    
*/
struct MaxHeap {
    private var heap: [Int] = []
    
    var isEmpty: Bool {
        return heap.isEmpty
    }
    
    mutating func push(_ value: Int) {
        heap.append(value)
        siftUp(from: heap.count - 1)
    }
    
    mutating func pop() -> Int? {
        guard !heap.isEmpty else { return nil }
        let value = heap[0]
        heap[0] = heap.last!
        heap.removeLast()
        siftDown(from: 0)
        return value
    }
    
    private mutating func siftUp(from index: Int) {
        var index = index
        while index > 0 {
            let parent = (index - 1) / 2
            if heap[index] <= heap[parent] {
                break
            }
            heap.swapAt(index, parent)
            index = parent
        }
    }
    
    private mutating func siftDown(from index: Int) {
        var index = index
        let count = heap.count
        while index < count {
            let left = 2 * index + 1
            let right = 2 * index + 2
            var largest = index
            
            if left < count && heap[left] > heap[largest] {
                largest = left
            }
            if right < count && heap[right] > heap[largest] {
                largest = right
            }
            if largest == index {
                break
            }
            heap.swapAt(index, largest)
            index = largest
        }
    }
}

class Solution {
    func findMaximizedCapital(_ k: Int, _ w: Int, _ profits: [Int], _ capital: [Int]) -> Int {
        let n = profits.count
        var currentCapital = w
        var projectIndex = 0
        var profitHeap = MaxHeap()
        
        // Build projects as an array of (capital, profit) pairs.
        var projects: [(capital: Int, profit: Int)] = []
        for i in 0..<n {
            projects.append((capital: capital[i], profit: profits[i]))
        }
        // Sort projects by their required capital (ascending)
        projects.sort { $0.capital < $1.capital }
        
        // Perform at most k rounds (projects)
        for _ in 0..<k {
            // Add all projects that are affordable with currentCapital.
            while projectIndex < projects.count && projects[projectIndex].capital <= currentCapital {
                profitHeap.push(projects[projectIndex].profit)
                projectIndex += 1
            }
            // If no project is affordable, break out.
            if profitHeap.isEmpty {
                break
            }
            // Choose the project with maximum profit.
            if let bestProfit = profitHeap.pop() {
                currentCapital += bestProfit
            }
        }
        
        return currentCapital        
    }
}
let solution = Solution()
print(solution.findMaximizedCapital(2, 0, [1,2,3], [0,1,1])) // Expect 4
print(solution.findMaximizedCapital(3, 0, [1,2,3], [0,1,2])) // Expect 6