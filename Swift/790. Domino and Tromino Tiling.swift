/*
You have two types of tiles: a 2 x 1 domino shape and a tromino shape. You may rotate these shapes.
Given an integer n, return the number of ways to tile an 2 x n board. Since the answer may be very large, return it modulo 109 + 7.
In a tiling, every square must be covered by a tile. 
Two tilings are different if and only if there are two 4-directionally adjacent cells on the board 
    such that exactly one of the tilings has both squares occupied by a tile.
    
790. Domino and Tromino Tiling    
*/
class Solution {
    func numTilings(_ n: Int) -> Int {
        if n < 3 { return n }
        
        let MOD = 1_000_000_007
        var full = Array(repeating: 0, count: n + 1)
        var partial = Array(repeating: 0, count: n + 1)
        full[0] = 1
        full[1] = 1
        full[2] = 2
        partial[2] = 1

        for width in 3...n {
            full[width] = (full[width - 1] + full[width - 2] + 2 * partial[width - 1]) % MOD
            partial[width] = (partial[width - 1] + full[width - 2]) % MOD
        }
        return full[n]
    }
}
let solution = Solution()
print(solution.numTilings(3)) // Expect 5
print(solution.numTilings(1))  // Expect 1