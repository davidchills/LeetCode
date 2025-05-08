/*
There is a dungeon with n x m rooms arranged as a grid.
You are given a 2D array moveTime of size n x m, where moveTime[i][j] represents the minimum time in seconds 
    when you can start moving to that room. You start from the room (0, 0) at time t = 0 and can move to an adjacent room. 
Moving between adjacent rooms takes one second for one move and two seconds for the next, alternating between the two.
Return the minimum time to reach the room (n - 1, m - 1).
Two rooms are adjacent if they share a common wall, either horizontally or vertically.
    
3342. Find Minimum Time to Reach Last Room II    
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
        let n = storage.count
        while true {
            let left = 2 * parent + 1
            let right = left + 1
            var candidate = parent

            if left < n && areSorted(storage[left], storage[candidate]) {
                candidate = left
            }
            if right < n && areSorted(storage[right], storage[candidate]) {
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
        let dirs = [(1,0),(-1,0),(0,1),(0,-1)]
        let INF = Int.max / 2
        var dist = Array(
            repeating: Array(repeating: [INF,INF], count: m),
            count: n
        )
        var pq = Heap<(time: Int, i: Int, j: Int, p: Int)>(order: { $0.time < $1.time })

        dist[0][0][0] = 0
        pq.push((0, 0, 0, 0))

        while let (t, i, j, p) = pq.pop() {
            if t != dist[i][j][p] { continue }
            if i == n - 1 && j == m - 1 {
                return t
            }
            let step = (p == 0 ? 1 : 2)
            for (di, dj) in dirs {
                let ni = i + di, nj = j + dj
                guard ni >= 0, ni < n, nj >= 0, nj < m else { continue }
                let depart = max(t, moveTime[ni][nj])
                let arrival = depart + step
                let np = p ^ 1  // flip parity
                if arrival < dist[ni][nj][np] {
                    dist[ni][nj][np] = arrival
                    pq.push((arrival, ni, nj, np))
                }
            }
        }

        return -1        
    }
}
let solution = Solution()
print(solution.minTimeToReach([[0,4],[4,4]])) // Expect 7
print(solution.minTimeToReach([[0,0,0,0],[0,0,0,0]])) // Expect 6
print(solution.minTimeToReach([[0,1],[1,2]])) // Expect 4
print(solution.minTimeToReach([[56,93],[3,38]])) // Expect 40
print(solution.minTimeToReach([[0,58],[27,69]])) // Expect 71