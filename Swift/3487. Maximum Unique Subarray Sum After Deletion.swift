/*
You are given an integer array nums.
You are allowed to delete any number of elements from nums without making it empty. 
After performing the deletions, select a subarray of nums such that:
All elements in the subarray are unique.
The sum of the elements in the subarray is maximized.
Return the maximum sum of such a subarray.
    
3487. Maximum Unique Subarray Sum After Deletion    
*/
class Solution {
    func maxSum(_ nums: [Int]) -> Int {
        let unique = Set(nums)
        var sumPos = 0
        for num in unique {
            if num > 0 {
                sumPos += num
            }
        }
        if sumPos > 0 {
            return sumPos
        }
        return nums.max()!
    }
}
let solution = Solution()
print(solution.maxSum([1,2,3,4,5])) // Expect 15
print(solution.maxSum([1,1,0,1,1])) // Expect 1
print(solution.maxSum([1,2,-1,-2,1,0,-1])) // Expect 3