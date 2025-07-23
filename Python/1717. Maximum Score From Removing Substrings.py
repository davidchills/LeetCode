"""
You are given a string s and two integers x and y. You can perform two types of operations any number of times.
Remove substring "ab" and gain x points.
For example, when removing "ab" from "cabxbae" it becomes "cxbae".
Remove substring "ba" and gain y points.
For example, when removing "ba" from "cabxbae" it becomes "cabxe".
Return the maximum points you can gain after applying the above operations on s.
"""
# 1717. Maximum Score From Removing Substrings
#from typing import List
class Solution:
    def maximumGain(self, s: str, x: int, y: int) -> int:
        def remove_pair(s: str, first: str, second: str, score: int) -> (str, int):
            stack = []
            total = 0
            for c in s:
                if stack and stack[-1] == first and c == second:
                    stack.pop()
                    total += score
                else:
                    stack.append(c)
            return ''.join(stack), total

        # Remove the higher scoring pair first
        if x > y:
            s, score1 = remove_pair(s, 'a', 'b', x)
            _, score2 = remove_pair(s, 'b', 'a', y)
        else:
            s, score1 = remove_pair(s, 'b', 'a', y)
            _, score2 = remove_pair(s, 'a', 'b', x)

        return score1 + score2       

    
# Test Code
solution = Solution()
print(solution.maximumGain("cdbcbbaaabab", 4, 5)) # Expect 19
print(solution.maximumGain("aabbaaxybbaabb", 5, 4)) # Expect 20

