/*
Given the array nums consisting of 2n elements in the form [x1,x2,...,xn,y1,y2,...,yn].
Return the array in the form [x1,y1,x2,y2,...,xn,yn].
    
1470. Shuffle the Array    
*/
class Solution {
    func shuffle(_ nums: [Int], _ n: Int) -> [Int] {
        var result: [Int] = []
        for i in 0..<n {
            result.append(nums[i])
            result.append(nums[i + n])
        }
        return result
    }
}
let solution = Solution()
print(solution.shuffle([2,5,1,3,4,7], 3)) // Expect [2,3,5,4,1,7]
print(solution.shuffle([1,2,3,4,4,3,2,1], 4)); // Expect [1,4,2,3,3,2,4,1]
print(solution.shuffle([1,1,2,2], 2)); // Expect [1,2,1,2]
