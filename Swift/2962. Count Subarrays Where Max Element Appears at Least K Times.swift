/*
DESCRIPTION
    
2962. Count Subarrays Where Max Element Appears at Least K Times    
*/
class Solution {
    func countSubarrays(_ nums: [Int], _ k: Int) -> Int {
        var result = 0
        var left = 0
        var remaining = k
        let maxValue = nums.max()
        
        for num in nums {
            if num == maxValue {
                remaining -= 1
            }
            while remaining == 0 {
                if nums[left] == maxValue {
                    remaining += 1
                }
                left += 1
            }
            result += left
        }
        return result
    }
}
let solution = Solution()
print(solution.countSubarrays([1,3,2,3,3], 2)) // Expect 6
print(solution.countSubarrays([1,4,2,1], 3))  // Expect 0