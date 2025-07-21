"""
A fancy string is a string where no three consecutive characters are equal.
Given a string s, delete the minimum possible number of characters from s to make it fancy.
Return the final string after the deletion. It can be shown that the answer will always be unique.
"""
# 1957. Delete Characters to Make Fancy String
from typing import List
class Solution:
    def makeFancyString(self, s: str) -> str:
        ans = []
        
        for letter in s:
            if len(ans) < 2 or not (ans[-1] == ans[-2] == letter):
                ans.append(letter)
        
        return ''.join(ans)       

    
# Test Code
solution = Solution()
print(solution.makeFancyString("leeetcode")) # Expect "leetcode"
print(solution.makeFancyString("aaabaaaa")) # Expect "aabaa"
print(solution.makeFancyString("aab")) # Expect "aab"

