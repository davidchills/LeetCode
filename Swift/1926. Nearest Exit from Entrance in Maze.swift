/*
You are given an m x n matrix maze (0-indexed) with empty cells (represented as '.') and walls (represented as '+'). 
You are also given the entrance of the maze, where entrance = [entrancerow, entrancecol] denotes the row and column of the cell you are initially standing at.
In one step, you can move one cell up, down, left, or right. You cannot step into a cell with a wall, and you cannot step outside the maze. 
Your goal is to find the nearest exit from the entrance. 
An exit is defined as an empty cell that is at the border of the maze. The entrance does not count as an exit.
Return the number of steps in the shortest path from the entrance to the nearest exit, or -1 if no such path exists.
    
1926. Nearest Exit from Entrance in Maze    
*/
class Solution {
    func nearestExit(_ maze: [[Character]], _ entrance: [Int]) -> Int {
        struct Coordinate: Hashable {
            let row: Int
            let col: Int
        }
        let numRows = maze.count
        let numCols = maze[0].count
        let directions = [(1,0), (-1,0), (0,1), (0, -1)]
        var queue = [(Int, Int, Int)]()
        queue.append((entrance[0], entrance[1], 0))
        var visited = Set<Coordinate>()
        visited.insert(Coordinate(row: entrance[0], col: entrance[1]))
        
        while !queue.isEmpty {
            let (i, j, dist) = queue.removeFirst()
            if (i == 0 || i == numRows - 1 || j == 0 || j == numCols - 1) && 
            (i, j) != (entrance[0], entrance[1]) && maze[i][j] == "." {
                return dist
            }
            for (di, dj) in directions {
                let ni = i + di
                let nj = j + dj
                if ni >= 0 && ni < numRows && nj >= 0 && nj < numCols &&
                    !visited.contains(Coordinate(row: ni, col: nj)) && maze[ni][nj] == "." {
                    visited.insert(Coordinate(row: ni, col: nj))
                    queue.append((ni, nj, dist + 1))
                }
            }
        }
        return -1
    }
}
let solution = Solution()
print(solution.nearestExit([["+","+",".","+"],[".",".",".","+"],["+","+","+","."]], [1,2])) // Expect 1
print(solution.nearestExit([["+","+","+"],[".",".","."],["+","+","+"]], [1,0]))  // Expect 2
print(solution.nearestExit([[".","+"]], [0,0]))  // Expect -1