/*
The XOR total of an array is defined as the bitwise XOR of all its elements, or 0 if the array is empty.
For example, the XOR total of the array [2,5,6] is 2 XOR 5 XOR 6 = 1.
Given an array nums, return the sum of all XOR totals for every subset of nums. 
Note: Subsets with the same elements should be counted multiple times.
An array a is a subset of an array b if a can be obtained from b by deleting some (possibly zero) elements of b.
    
1863. Sum of All Subset XOR Totals    
*/
class Solution {
    func subsetXORSum(_ nums: [Int]) -> Int {
        let n = nums.count
        func dfs(_ index: Int, _ currentXOR: Int) -> Int {
            if index == n { return currentXOR }
            let with = dfs(index + 1, currentXOR ^ nums[index])
            let without = dfs(index + 1, currentXOR)
            return with + without
        }
        return dfs(0,0)
    }
}
let solution = Solution()
print(solution.subsetXORSum([1,3])) // Expect 6
print(solution.subsetXORSum([5,1,6])) // Expect 28
print(solution.subsetXORSum([3,4,5,6,7,8])) // Expect 480