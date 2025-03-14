"""
Given an encoded string, return its decoded string.
The encoding rule is: k[encoded_string], where the encoded_string inside the square brackets is being repeated exactly k times. 
    Note that k is guaranteed to be a positive integer.
You may assume that the input string is always valid; there are no extra white spaces, square brackets are well-formed, etc. 
    Furthermore, you may assume that the original data does not contain any digits and that digits are only for those repeat numbers, k. 
    For example, there will not be input like 3a or 2[4].
The test cases are generated so that the length of the output will never exceed 105.
"""
# 394. Decode String
from typing import List
from collections import deque
class Solution:
    def decodeString(self, s: str) -> str:
        n = len(s)
        stack = deque()
        num = 0
        builtString = ""
        
        for i in range(n):
            char = s[i]
            if char.isdigit():
                num = num * 10 + int(char)
            elif char == '[':
                stack.append([builtString, num])
                builtString = ""
                num = 0
            elif char == ']':
                prevStr, repeatTimes = stack.pop()
                if len(builtString) > 1000000:
                    return "Output too large! Skipping expansion."
                builtString = prevStr + (builtString * repeatTimes)
            else:
                builtString += char
            
        return builtString
    
# Test Code

solution = Solution()
print(solution.decodeString("3[a]2[bc]")) # Expect "aaabcbc"
print(solution.decodeString("3[a2[c]]")) # Expect "accaccacc"
print(solution.decodeString("2[abc]3[cd]ef")) # Expect "abcabccdcdcdef"
print(solution.decodeString("99[99[99[99[99[99[a]]]]]]")) # Expect "Output too large! Skipping expansion."
