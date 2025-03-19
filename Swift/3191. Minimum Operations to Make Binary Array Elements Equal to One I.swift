/*
You are given a binary array nums.
You can do the following operation on the array any number of times (possibly zero):
Choose any 3 consecutive elements from the array and flip all of them.
Flipping an element means changing its value from 0 to 1, and from 1 to 0.
Return the minimum number of operations required to make all elements in nums equal to 1. If it is impossible, return -1.
    
3191. Minimum Operations to Make Binary Array Elements Equal to One I    
*/
class Solution {
    func minOperations(_ nums: [Int]) -> Int {
        var nums = nums
        var flips: Int = 0
        var i: Int = 0
        
        while i <= nums.count - 3 {
            if nums[i] == 0 {
                nums[i] ^= 1
                nums[i + 1] ^= 1
                nums[i + 2] ^= 1
                flips += 1
            }
            i += 1
        }

        return nums.contains(0) ? -1 : flips
    }
}
let solution = Solution()
print(solution.minOperations([0,1,1,1,0,0])) // Expect 3
print(solution.minOperations([0,1,1,1])) // Expect -1