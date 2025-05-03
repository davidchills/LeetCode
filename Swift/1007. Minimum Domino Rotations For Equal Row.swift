/*
In a row of dominoes, tops[i] and bottoms[i] represent the top and bottom halves of the ith domino. 
(A domino is a tile with two numbers from 1 to 6 - one on each half of the tile.)
We may rotate the ith domino, so that tops[i] and bottoms[i] swap values.
Return the minimum number of rotations so that all the values in tops are the same, or all the values in bottoms are the same.
    
1007. Minimum Domino Rotations For Equal Row    
*/
class Solution {
    func minDominoRotations(_ tops: [Int], _ bottoms: [Int]) -> Int {
        func check(_ x: Int) -> Int {
            var rotationsTop = 0
            var rotationsBottom = 0
            for (top, bottom) in zip(tops, bottoms) {
                if top != x && bottom != x {
                    return Int.max
                }
                if top != x {
                    rotationsTop += 1
                }
                if bottom != x {
                    rotationsBottom += 1
                }
            }
            return min(rotationsTop, rotationsBottom)
        }
        let candidates = Set([tops[0], bottoms[0]])
        var rotations = Int.max
        for x in candidates {
            rotations = min(rotations, check(x))
        }
        return rotations != Int.max ? rotations : -1
    }
}
let solution = Solution()
print(solution.minDominoRotations([2,1,2,4,2,2], [5,2,6,2,3,2])) // Expect 2
print(solution.minDominoRotations([3,5,1,2,3], [3,6,3,3,4]))  // Expect -1
print(solution.minDominoRotations([1,2,1,1,1,2,2,2], [2,1,2,2,2,2,2,2]))  // Expect 1