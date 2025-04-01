/*
You are given an m x n integer matrix matrix with the following two properties:
• Each row is sorted in non-decreasing order.
• The first integer of each row is greater than the last integer of the previous row.
Given an integer target, return true if target is in matrix or false otherwise.
You must write a solution in O(log(m * n)) time complexity.
    
74. Search a 2D Matrix    
*/
class Solution {
    func searchMatrix(_ matrix: [[Int]], _ target: Int) -> Bool {
        guard !matrix.isEmpty, !matrix[0].isEmpty else { return false }
        let rows = matrix.count
        let cols = matrix[0].count
        if (target < matrix[0][0] || target > matrix[rows - 1][cols - 1]) {
            return false
        }        
        var left = 0
        var right = (rows * cols) - 1
        while left <= right {
            let mid = left + (right - left) / 2
            let row = mid / cols
            let col = mid % cols
            let value = matrix[row][col]
            if value == target { return true }
            else if value < target { left = mid + 1 }
            else { right = mid - 1 }
        }
        return false
    }
}
let solution = Solution()
print(solution.searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 3)); // Expect true
print(solution.searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 13)); // Expect false