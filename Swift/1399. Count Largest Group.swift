/*
You are given an integer n.
Each number from 1 to n is grouped according to the sum of its digits.
Return the number of groups that have the largest size.
    
1399. Count Largest Group    
*/
class Solution {
    func countLargestGroup(_ n: Int) -> Int {
        guard n > 0 else { return 0 }
        
        var counts = [Int: Int]()
        for i in 1...n {
            counts[sumOfDigits(i), default: 0] += 1
        }
        
        let maxSize = counts.values.max() ?? 0
        return counts.values.filter { $0 == maxSize }.count
    }
    
    private func sumOfDigits(_ x: Int) -> Int {
        var sum = 0, v = x
        while v > 0 {
            sum += v % 10
            v /= 10
        }
        return sum        
    }
}
let solution = Solution()
print(solution.countLargestGroup(13)) // Expect 4
print(solution.countLargestGroup(2))  // Expect 2