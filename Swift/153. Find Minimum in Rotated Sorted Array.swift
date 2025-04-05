/*
Suppose an array of length n sorted in ascending order is rotated between 1 and n times. 
    For example, the array nums = [0,1,2,4,5,6,7] might become:
[4,5,6,7,0,1,2] if it was rotated 4 times.
[0,1,2,4,5,6,7] if it was rotated 7 times.
Notice that rotating an array [a[0], a[1], a[2], ..., a[n-1]] 1 time results in the array [a[n-1], a[0], a[1], a[2], ..., a[n-2]].
Given the sorted rotated array nums of unique elements, return the minimum element of this array.
You must write an algorithm that runs in O(log n) time.
    
153. Find Minimum in Rotated Sorted Array    
*/
class Solution {
    func findMin(_ nums: [Int]) -> Int {
        let n = nums.count
        var left = 0
        var right = n - 1
        if nums[left] <= nums[right] { return nums[left] }
        while left < right {
            let mid = left + (right - left) / 2
            if nums[mid] > nums[right] {
                left = mid + 1
            }
            else { right = mid }
        }
        return nums[left]
    }
}
let solution = Solution()
print(solution.findMin([3,4,5,1,2])) // Expect 1
print(solution.findMin([4,5,6,7,0,1,2]))  // Expect 0
print(solution.findMin([11,13,15,17])) // Expect 11