/*
You are given an integer array nums. You need to ensure that the elements in the array are distinct. 
To achieve this, you can perform the following operation any number of times:
Remove 3 elements from the beginning of the array. If the array has fewer than 3 elements, remove all remaining elements.
Note that an empty array is considered to have distinct elements. 
Return the minimum number of operations needed to make the elements in the array distinct.
    
3396. Minimum Number of Operations to Make Elements in Array Distinct    
*/
class Solution {
    func minimumOperations(_ nums: [Int]) -> Int {
        var operations = 0
        var numsCopy = nums
        while !numsCopy.isEmpty && numsCopy.count != Set(numsCopy).count {
            if numsCopy.count >= 3 {
                numsCopy.removeSubrange(0...2)
            }
            else { numsCopy.removeAll() } 
            operations += 1
        }
        return operations
    }
}
let solution = Solution()
print(solution.minimumOperations([1,2,3,4,2,3,3,5,7])) // Expect 2
print(solution.minimumOperations([4,5,6,4,4])) // Expect 2
print(solution.minimumOperations([6,7,8,9])) // Expect 0