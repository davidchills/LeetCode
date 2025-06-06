"""
You are given a string s and a robot that currently holds an empty string t. 
Apply one of the following operations until s and t are both empty:
Remove the first character of a string s and give it to the robot. The robot will append this character to the string t.
Remove the last character of a string t and give it to the robot. The robot will write this character on paper.
Return the lexicographically smallest string that can be written on the paper.
"""
# 2434. Using a Robot to Print the Lexicographically Smallest String
from typing import List
class Solution:
    def robotWithString(self, s: str) -> str:
        n = len(s)
        if n == 0:
            return ""
        s = list(s)        
        t = []
        p = []
        suffixMin = [''] * n
        suffixMin[n - 1] = s[n - 1]
        
        for i in range(n - 2, -1, -1):
            if s[i] < suffixMin[i + 1]:
                suffixMin[i] = s[i]
            else:
                suffixMin[i] = suffixMin[i + 1]
                
        i = 0
        while i < n:
            if s[i] == suffixMin[i]:
                p.append(s[i])
                i += 1
                while t and (i == n or t[-1] <= suffixMin[i]):
                    p.append(t.pop())
                    
            else:
                t.append(s[i])
                i += 1
                
        while t:
            p.append(t.pop())
            
        return "".join(p)
                
        
    
# Test Code
solution = Solution()
print(solution.robotWithString("zza")) # Expect "azz"
print(solution.robotWithString("bac")) # Expect "abc"
print(solution.robotWithString("bdda")) # Expect "addb"