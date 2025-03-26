/*
You are given a 2D integer grid of size m x n and an integer x. 
    In one operation, you can add x to or subtract x from any element in the grid.
A uni-value grid is a grid where all the elements of it are equal.
Return the minimum number of operations to make the grid uni-value. If it is not possible, return -1.
    
2033. Minimum Operations to Make a Uni-Value Grid    
*/
class Solution {
    func minOperations(_ grid: [[Int]], _ x: Int) -> Int {
        var flattened = grid.flatMap { $0 }
        let remainder = flattened[0] % x
        for number in flattened {
            if number % x != remainder {
                return -1;
            }
        }
        flattened.sort()
        let median = flattened[flattened.count / 2]
        var operations = 0;
        for number in flattened {
            operations += abs(number - median) / x
        }
        return operations
    }
}
let solution = Solution()
print(solution.minOperations([[2,4],[6,8]], 2)); // Expect 4
print(solution.minOperations([[1,5],[2,3]], 1)); // Expect 5
print(solution.minOperations([[1,2],[3,4]], 2)); // Expect -1