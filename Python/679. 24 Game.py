"""
You are given an integer array cards of length 4. You have four cards, each containing a number in the range [1, 9]. 
You should arrange the numbers on these cards in a mathematical expression using the operators ['+', '-', '*', '/'] 
    and the parentheses '(' and ')' to get the value 24.
You are restricted with the following rules:
The division operator '/' represents real division, not integer division.
For example, 4 / (1 - 2 / 3) = 4 / (1 / 3) = 12.
Every operation done is between two numbers. In particular, we cannot use '-' as a unary operator.
For example, if cards = [1, 1, 1, 1], the expression "-1 - 1 - 1 - 1" is not allowed.
You cannot concatenate numbers together
For example, if cards = [1, 2, 1, 2], the expression "12 + 12" is not valid.
Return true if you can get such expression that evaluates to 24, and false otherwise.
"""
# 679. 24 Game
from typing import List
class Solution:
    def judgePoint24(self, cards: List[int]) -> bool:
        EPS = 1e-6
        def dfs(nums):
            if len(nums) == 1:
                return abs(nums[0] - 24) < EPS

            # pick two distinct indices i < j
            for i in range(len(nums)):
                for j in range(i + 1, len(nums)):
                    a, b = nums[i], nums[j]
                    # all possible results combining a and b
                    candidates = [
                        a + b,
                        a - b,
                        b - a,
                        a * b,
                    ]
                    if abs(b) > EPS:
                        candidates.append(a / b)
                    if abs(a) > EPS:
                        candidates.append(b / a)

                    # build the next list with remaining numbers
                    rest = [nums[k] for k in range(len(nums)) if k != i and k != j]
                    for val in candidates:
                        if dfs(rest + [val]):
                            return True
            return False

        return dfs([float(x) for x in cards])

    
# Test Code
solution = Solution()
print(solution.judgePoint24([4,1,8,7])) # Expect True
print(solution.judgePoint24([1,2,1,2])) # Expect False

