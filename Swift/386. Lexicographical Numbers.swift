/*
Given an integer n, return all the numbers in the range [1, n] sorted in lexicographical order.
You must write an algorithm that runs in O(n) time and uses O(1) extra space. 
    
386. Lexicographical Numbers    
*/
class Solution {
    func lexicalOrder(_ n: Int) -> [Int] {
        var result = [Int]()
        var current = 1
        
        for _ in 0..<n {
            // Append the current value to the return result.
            result.append(current)
            // 1) Try to go lexicographically deeper (append a '0' digit)
            if current * 10 <= n {
                current *= 10
            }
            else {
                // 2) Otherwise back up until we can increment
                while current % 10 == 9 || current + 1 > n {
                    current /= 10
                }
                current += 1
            }
        }
        return result
    }
}
let solution = Solution()
print(solution.lexicalOrder(13)) // Expect [1,10,11,12,13,2,3,4,5,6,7,8,9]
print(solution.lexicalOrder(2))  // Expect [1,2]