"""
You are given two positive integers n and limit.
Return the total number of ways to distribute n candies among 3 children such that no child gets more than limit candies.
"""
# 2929. Distribute Candies Among Children II
class Solution:
    def distributeCandies(self, n: int, limit: int) -> int:
        def countSolutions(total: int) -> int:
            if total < 0:
                return 0
            return (total + 2) * (total + 1) // 2

        m = limit + 1

        totalUnbounded = countSolutions(n)
        boundSubtractOne = 3 * countSolutions(n - m)
        boundAddTwo = 3 * countSolutions(n - 2 * m)
        boundSubtractThree = countSolutions(n - 3 * m)

        return (
            totalUnbounded
            - boundSubtractOne
            + boundAddTwo
            - boundSubtractThree
        )
        
# Test Code
solution = Solution()
print(solution.distributeCandies(5, 2)) # Expect 3
print(solution.distributeCandies(3, 3)) # Expect 10