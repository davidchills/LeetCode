/*
You are given two positive integers n and limit.
Return the total number of ways to distribute n candies among 3 children such that no child gets more than limit candies.
    
2929. Distribute Candies Among Children II    
*/
class Solution {
    func distributeCandies(_ n: Int, _ limit: Int) -> Int {
        func countSoltions(_ total: Int) -> Int {
            guard total >= 0 else { return 0 }
            return (total + 2) * (total + 1) / 2
        }
        
        let m = limit + 1
        let totalUnbound = countSoltions(n)
        let boundSubtractOne = 3 * countSoltions(n - m)
        let boundAddTwo = 3 * countSoltions(n - 2 * m)
        let boundSubtractThree = countSoltions(n - 3 * m)
        
        return (totalUnbound
            - boundSubtractOne
            + boundAddTwo
            - boundSubtractThree)
    }
}
let solution = Solution()
print(solution.distributeCandies(5, 2)) // Expect 3
print(solution.distributeCandies(3, 3))  // Expect 10
print(solution.distributeCandies(6, 1))  // Expect 0