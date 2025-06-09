/*
Given two integers n and k, return the kth lexicographically smallest integer in the range [1, n].
    
440. K-th Smallest in Lexicographical Order    
*/
class Solution {
    func findKthNumber(_ n: Int, _ k: Int) -> Int {
        
        func skipTrees(_ test: Int) -> Int {
            var count = 0
            var prefix1 = test
            var prefix2 = test + 1
            
            while prefix1 <= n {
                count += min(n + 1, prefix2) - prefix1
                prefix1 *= 10
                prefix2 *= 10
            }
            return count
        }
        
        var current = 1
        var kth = k - 1 // Using the first number (1).
        
        while kth > 0 {
            let count = skipTrees(current)
            if kth >= count {
                // Skip this subtree.
                kth -= count
                current += 1
            }
            else {
                // Answer is in this subtree.
                kth -= 1
                current *= 10
            }
        }
        return current
    }
}
let solution = Solution()
print(solution.findKthNumber(13, 2)) // Expect 10
print(solution.findKthNumber(1, 1))  // Expect 1
print(solution.findKthNumber(100, 10))  // Expect 17