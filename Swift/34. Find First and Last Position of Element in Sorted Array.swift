/*
Given an array of integers nums sorted in non-decreasing order, find the starting and ending position of a given target value.
If target is not found in the array, return [-1, -1].
You must write an algorithm with O(log n) runtime complexity.
    
34. Find First and Last Position of Element in Sorted Array    
*/
class Solution {
    func searchRange(_ nums: [Int], _ target: Int) -> [Int] {
        let n = nums.count
        func findLeft() -> Int {
            var left = 0
            var right = n - 1
            var index = -1
            while left <= right {
                let mid = left + (right - left) / 2
                if nums[mid] >= target {
                    if nums[mid] == target { index = mid }
                    right = mid - 1
                }
                else { left = mid + 1 }
            }
            return index
        }
        func findRight() -> Int {
            var left = 0
            var right = n - 1
            var index = -1
            while left <= right {
                let mid = left + (right - left) / 2
                if nums[mid] <= target {
                    if nums[mid] == target { index = mid }
                    left = mid + 1
                }
                else { right = mid - 1 }
            }
            return index
        }
        let leftIndex = findLeft()
        if leftIndex == -1 { return [-1, -1] }
        let rightIndex = findRight()
        return [leftIndex, rightIndex]
    }
}
let solution = Solution()
print(solution.searchRange([5,7,7,8,8,10], 8)) // Expect [3,4]
print(solution.searchRange([5,7,7,8,8,10], 6)) // Expect [-1,-1]
print(solution.searchRange([], 0)) // Expect [-1,-1]