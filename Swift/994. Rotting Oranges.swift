/*
You are given an m x n grid where each cell can have one of three values:
0 representing an empty cell,
1 representing a fresh orange, or
2 representing a rotten orange.
Every minute, any fresh orange that is 4-directionally adjacent to a rotten orange becomes rotten.
Return the minimum number of minutes that must elapse until no cell has a fresh orange. If this is impossible, return -1.
    
994. Rotting Oranges    
*/
class Solution {
    func orangesRotting(_ grid: [[Int]]) -> Int {
        var grid = grid
        let rows = grid.count
        let cols = grid[0].count
        let directions = [(1, 0), (-1, 0), (0, 1), (0, -1)]
        var fresh = 0
        var minutes = 0
        var queue: [(Int, Int)] = []
        
        for i in 0..<rows {
            for j in 0..<cols {
                if grid[i][j] == 2 {
                    queue.append((i, j))
                }
                else if grid[i][j] == 1 {
                    fresh += 1
                }                 
            }
        }
        
        // If there are no fresh oranges, return 0.
        if fresh == 0 { return 0 }

        while !queue.isEmpty {
            var newQueue: [(Int, Int)] = []
            for (i, j) in queue {
                for (di, dj) in directions {
                    let ni = i + di, nj = j + dj
                    // Check bounds and whether the orange is fresh.
                    if ni >= 0 && ni < rows && nj >= 0 && nj < cols && grid[ni][nj] == 1 {
                        grid[ni][nj] = 2   // Turn fresh orange rotten.
                        fresh -= 1
                        newQueue.append((ni, nj))
                    }
                }
            }
            if !newQueue.isEmpty { minutes += 1 }
            queue = newQueue
        }
        
        // If there are still fresh oranges left, return -1.
        return fresh == 0 ? minutes : -1        
    }
}
let solution = Solution()
print(solution.orangesRotting([[2,1,1],[1,1,0],[0,1,1]])) // Expect 4
print(solution.orangesRotting([[2,1,1],[0,1,1],[1,0,1]])) // Expect -1
print(solution.orangesRotting([[0,2]])) // Expect 0