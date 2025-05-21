/*
Given an m x n integer matrix matrix, if an element is 0, set its entire row and column to 0's.
You must do it in place.
    
73. Set Matrix Zeroes    
*/
class Solution {
    func setZeroes(_ matrix: inout [[Int]]) {
        let numRows = matrix.count
        let numCols = matrix[0].count
        var zeroRows: [Int] = []
        var zeroCols: [Int] = []
        
        for i in 0..<numRows {
            for j in 0..<numCols {
                if matrix[i][j] == 0 {
                    zeroRows.append(i)
                    zeroCols.append(j)
                }
            }
        }
        for row in zeroRows {
            for i in 0..<numCols {
                matrix[row][i] = 0
            }
        }
        for col in zeroCols {
            for i in 0..<numRows {
                matrix[i][col] = 0
            }
        }
    }
}
let solution = Solution()
var matrix1 = [[1,1,1],[1,0,1],[1,1,1]]
var matrix2 = [[0,1,2,0],[3,4,5,2],[1,3,1,5]]
solution.setZeroes(&matrix1)
print(matrix1) // Expect [[1,0,1],[0,0,0],[1,0,1]]
solution.setZeroes(&matrix2) 
print(matrix2) // Expect [[0,0,0,0],[0,4,5,0],[0,3,1,0]]