/*
Given a zero-based permutation nums (0-indexed), build an array ans of the same length where 
    ans[i] = nums[nums[i]] for each 0 <= i < nums.length and return it.
A zero-based permutation nums is an array of distinct integers from 0 to nums.length - 1 (inclusive).
Follow-up: Can you solve it without using an extra space (i.e., O(1) memory)?
    
1920. Build Array from Permutation    
*/
class Solution {
    func buildArray(_ nums: [Int]) -> [Int] {
        let n = nums.count
        // Lets do it in place, so no additional space
        var nums = nums
        // Encode the new+old value in place
        for i in 0..<n {
            nums[i] += n * (nums[nums[i]] % n)
        }
        // Decode to get just the new value
        for i in 0..<n {
            nums[i] = nums[i] / n
        }
        return nums
    }
}
let solution = Solution()
print(solution.buildArray([0,2,1,5,3,4])) // Expect [0,1,2,4,5,3]
print(solution.buildArray([5,0,1,2,3,4]))  // Expect [4,5,0,1,2,3]