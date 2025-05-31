/*
You are given an n x n integer matrix board where the cells are labeled from 1 to n2 in a 
    Boustrophedon style starting from the bottom left of the board (i.e. board[n - 1][0]) and 
    alternating direction each row.
You start on square 1 of the board. In each move, starting from square curr, do the following:

Choose a destination square next with a label in the range [curr + 1, min(curr + 6, n2)].
This choice simulates the result of a standard 6-sided die roll: i.e., there are always at most 6 destinations, 
    regardless of the size of the board.
If next has a snake or ladder, you must move to the destination of that snake or ladder. Otherwise, you move to next.
The game ends when you reach the square n2.
A board square on row r and column c has a snake or ladder if board[r][c] != -1. 
    The destination of that snake or ladder is board[r][c]. Squares 1 and n2 are not the starting points of any snake or ladder.
Note that you only take a snake or ladder at most once per dice roll. If the destination to a snake or ladder is the start of another snake or ladder, 
    you do not follow the subsequent snake or ladder.
For example, suppose the board is [[-1,4],[-1,3]], and on the first move, your destination square is 2. 
    You follow the ladder to square 3, but do not follow the subsequent ladder to 4.
Return the least number of dice rolls required to reach the square n2. 
    If it is not possible to reach the square, return -1.
    
909. Snakes and Ladders    
*/
class Solution {
    func snakesAndLadders(_ board: [[Int]]) -> Int {
        let n = board.count
        let target = n * n
        var flattened = [Int](repeating: -1, count: target + 1)
        var idx = 1
        var visited = [Bool](repeating: false, count: target + 1)
        visited[1] = true
        
        var queue: [(position: Int, moves: Int)] = []
        queue.append((position: 1, moves: 0))
        var head = 0
        
        for row in stride(from: n - 1, through: 0, by: -1) {
            let leftToRight = ((n - 1 - row) % 2 == 0)
            if leftToRight {
                for col in 0..<n {
                    if board[row][col] != -1 {
                        flattened[idx] = board[row][col]
                    }
                    idx += 1
                }
            } 
            else {
                for col in stride(from: n - 1, through: 0, by: -1) {
                    if board[row][col] != -1 {
                        flattened[idx] = board[row][col]
                    }
                    idx += 1
                }
            }
        }
                
        while head < queue.count {
            let (position, moves) = queue[head]
            head += 1
            
            if position == target {
                return moves
            }
            
            for dice in 1...6 {
                var nextPosition = position + dice
                if nextPosition > target {
                    break
                }
                
                if flattened[nextPosition] != -1 {
                    nextPosition = flattened[nextPosition]
                }
                
                if !visited[nextPosition] {
                    visited[nextPosition] = true
                    queue.append((position: nextPosition, moves: moves + 1))
                }
            }
        }
        
        return -1        
    }
}
let solution = Solution()
print(solution.snakesAndLadders([[-1,-1,-1,-1,-1,-1],[-1,-1,-1,-1,-1,-1],[-1,-1,-1,-1,-1,-1],[-1,35,-1,-1,13,-1],[-1,-1,-1,-1,-1,-1],[-1,15,-1,-1,-1,-1]])); // Expect 4
print(solution.snakesAndLadders([[-1,-1],[-1,3]])); // Expect 1