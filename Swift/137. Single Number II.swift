/*
Given an integer array nums where every element appears three times except for one, which appears exactly once. 
Find the single element and return it.
You must implement a solution with a linear runtime complexity and use only constant extra space.
    
137. Single Number II    
*/
class Solution {
    func singleNumber(_ nums: [Int]) -> Int {
        return (3 * Set(nums).reduce(0, +) - nums.reduce(0, +)) / 2
    }
}
let solution = Solution()
print(solution.singleNumber([2,2,3,2])) // Expect 3
print(solution.singleNumber([0,1,0,1,0,1,99]))  // Expect 99