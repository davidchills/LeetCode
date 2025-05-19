/*
You are given a 0-indexed integer array nums of size 3 which can form the sides of a triangle.
A triangle is called equilateral if it has all sides of equal length.
A triangle is called isosceles if it has exactly two sides of equal length.
A triangle is called scalene if all its sides are of different lengths.
Return a string representing the type of triangle that can be formed or "none" if it cannot form a triangle.
    
3024. Type of Triangle    
*/
class Solution {
    func triangleType(_ nums: [Int]) -> String {
        let nums = nums.sorted()
        if nums[0] + nums[1] > nums[2] {
            if nums[0] == nums[2] {
                return "equilateral"
            }
            else if nums[0] == nums[1] || nums[1] == nums[2] {
                return "isosceles"
            }
            else { return "scalene" }
        }
        return "none"
    }
}
let solution = Solution()
print(solution.triangleType([3,3,3])) // Expect "equilateral"
print(solution.triangleType([3,4,5]))  // Expect "scalene"
print(solution.triangleType([5,3,8]))  // Expect "none"