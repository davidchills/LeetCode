/*
Given an array nums with n objects colored red, white, or blue, sort them in-place so that objects of the same color are adjacent, 
    with the colors in the order red, white, and blue.
We will use the integers 0, 1, and 2 to represent the color red, white, and blue, respectively.
You must solve this problem without using the library's sort function.
Follow up: Could you come up with a one-pass algorithm using only constant extra space?

75. Sort Colors    
*/
class Solution {
    func sortColors(_ nums: inout [Int]) {
        var low = 0
        var mid = 0
        var high = nums.count - 1
        
        while mid <= high {
            if nums[mid] == 0 {
                //(nums[low], nums[mid]) = (nums[mid], nums[low])
                nums.swapAt(low, mid)
                low += 1
                mid += 1
            }
            else if nums[mid] == 1 {
                mid += 1
            }
            else {
                //(nums[mid], nums[high]) = (nums[high], nums[mid])
                nums.swapAt(mid, high)
                high -= 1
            }
        }
    }
}
let solution = Solution()
var nums1 = [2,0,2,1,1,0]
solution.sortColors(&nums1)
print(nums1) // Expects [0, 0, 1, 1, 2, 2]

var nums2 = [2,0,1]
solution.sortColors(&nums2)
print(nums2) // Expects [0, 1, 2]
