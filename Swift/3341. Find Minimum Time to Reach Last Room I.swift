/*
There is a dungeon with n x m rooms arranged as a grid.
You are given a 2D array moveTime of size n x m, where moveTime[i][j] 
    represents the minimum time in seconds when you can start moving to that room. 
You start from the room (0, 0) at time t = 0 and can move to an adjacent room. Moving between adjacent rooms takes exactly one second.
Return the minimum time to reach the room (n - 1, m - 1).
Two rooms are adjacent if they share a common wall, either horizontally or vertically.
    
3341. Find Minimum Time to Reach Last Room I    
*/
struct Heap<Element> {
    private var storage: [Element] = []
    private let areSorted: (Element, Element) -> Bool

    init(order: @escaping (Element, Element) -> Bool) {
        self.areSorted = order
    }

    var isEmpty: Bool { storage.isEmpty }
    var count: Int    { storage.count }

    mutating func push(_ value: Element) {
        storage.append(value)
        siftUp(from: storage.count - 1)
    }

    mutating func pop() -> Element? {
        guard !storage.isEmpty else { return nil }
        storage.swapAt(0, storage.count - 1)
        let value = storage.removeLast()
        siftDown(from: 0)
        return value
    }

    private mutating func siftUp(from index: Int) {
        var child = index
        var parent = (child - 1) / 2
        while child > 0 && areSorted(storage[child], storage[parent]) {
            storage.swapAt(child, parent)
            child = parent
            parent = (child - 1) / 2
        }
    }

    private mutating func siftDown(from index: Int) {
        var parent = index
        while true {
            let left = 2 * parent + 1
            let right = left + 1
            var candidate = parent

            if left < storage.count && areSorted(storage[left], storage[candidate]) {
                candidate = left
            }
            if right < storage.count && areSorted(storage[right], storage[candidate]) {
                candidate = right
            }
            if candidate == parent { break }
            storage.swapAt(parent, candidate)
            parent = candidate
        }
    }
}

class Solution {
    func minTimeToReach(_ moveTime: [[Int]]) -> Int {
        let n = moveTime.count, m = moveTime[0].count
        let dirs = [(1,0), (-1,0), (0,1), (0,-1)]
        
        var dist = Array(repeating: Array(repeating: Int.max, count: m), count: n)
        
        var pq = Heap<(time: Int, row: Int, col: Int)>(order: { $0.time < $1.time })
        
        dist[0][0] = 0
        pq.push((0, 0, 0))        
        while let (t, i, j) = pq.pop() {
            guard t == dist[i][j] else { continue }
            if i == n-1 && j == m-1 { return t }
            
            for (di, dj) in dirs {
                let ni = i + di, nj = j + dj
                guard ni >= 0, ni < n, nj >= 0, nj < m else { continue }
                let depart = max(t, moveTime[ni][nj])
                let arrive = depart + 1
                if arrive < dist[ni][nj] {
                    dist[ni][nj] = arrive
                    pq.push((arrive, ni, nj))
                }
            }
        }
        
        return -1       
    }
}
let solution = Solution()
print(solution.minTimeToReach([[0,4],[4,4]])) // Expect 6
print(solution.minTimeToReach([[0,0,0],[0,0,0]])) // Expect 3
print(solution.minTimeToReach([[0,1],[1,2]])) // Expect 3
print(solution.minTimeToReach([[56,93],[3,38]])) // Expect 39
