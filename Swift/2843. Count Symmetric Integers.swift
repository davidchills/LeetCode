/*
You are given two positive integers low and high.
An integer x consisting of 2 * n digits is symmetric if the sum of the first n digits of x is equal to the sum of the last n digits of x. 
Numbers with an odd number of digits are never symmetric.
Return the number of symmetric integers in the range [low, high].
    
2843. Count Symmetric Integers    
*/
class Solution {
    func countSymmetricIntegers(_ low: Int, _ high: Int) -> Int {
        var result = 0
        for num in low...high {
            let numStr = String(num)
            let n = numStr.count
            if n % 2 == 0 {
                let mid = n / 2
                let digits = numStr.compactMap { Int(String($0)) }
                let leftSum = digits[0..<mid].reduce(0, +)
                let rightSum = digits[mid..<n].reduce(0, +)
                if leftSum == rightSum { result += 1 }
            }
        }
        return result
    }
}
let solution = Solution()
print(solution.countSymmetricIntegers(1, 100)) // Expect 9
print(solution.countSymmetricIntegers(1200, 1230))  // Expect 4