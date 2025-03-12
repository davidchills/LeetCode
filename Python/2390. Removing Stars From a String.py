"""
You are given a string s, which contains stars *.
In one operation, you can:
Choose a star in s.
Remove the closest non-star character to its left, as well as remove the star itself.
Return the string after all stars have been removed.
Note:
The input will be generated such that the operation is always possible.
It can be shown that the resulting string will always be unique.
"""
# 2390. Removing Stars From a String
class Solution:
    def removeStars(self, s: str) -> str:
        n = len(s)
        stack = []
        
        for i in range(n):
            if s[i] != '*':
                stack.append(s[i])
            else:
                stack.pop()
                
        return "".join(stack)

    
# Test Code
solution = Solution()
print(solution.removeStars("leet**cod*e")) # Expect "lecoe"
print(solution.removeStars("erase*****")) # Expect ""