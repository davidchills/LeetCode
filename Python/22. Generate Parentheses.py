"""
Given n pairs of parentheses, write a function to generate all combinations of well-formed parentheses.
"""
# 22. Generate Parentheses
from typing import List
class Solution:
    def generateParenthesis(self, n: int) -> List[str]:
        self.result = []
        self.backtrack("", 0, 0, n)
        return self.result
    
    def backtrack(self, currentSet: str, openPar: int, closePar: int, maxPar: int):
        if len(currentSet) == maxPar * 2:
            self.result.append(currentSet)
            return
        
        if openPar < maxPar:
            self.backtrack(currentSet + "(", openPar + 1, closePar, maxPar)
        
        if closePar < openPar:
            self.backtrack(currentSet + ")", openPar, closePar + 1, maxPar)
        
    
# Test Code
solution = Solution()
print(solution.generateParenthesis(3)) # Expect ["((()))","(()())","(())()","()(())","()()()"]
print(solution.generateParenthesis(1)) # Expect ["()"]