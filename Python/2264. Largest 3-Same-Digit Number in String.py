"""
You are given a string num representing a large integer. An integer is good if it meets the following conditions:
It is a substring of num with length 3.
It consists of only one unique digit.
Return the maximum good integer as a string or an empty string "" if no such integer exists.
Note:
A substring is a contiguous sequence of characters within a string.
There may be leading zeroes in num or a good integer.
"""
# 2264. Largest 3-Same-Digit Number in String
#from typing import List
class Solution:
    def largestGoodInteger(self, num: str) -> str:
        best = ""
        for i in range(len(num) - 2):
            if num[i] == num[i+1] == num[i+2]:
                cand = num[i:i+3]
                if cand > best:
                    best = cand
        return best
    
# Test Code
solution = Solution()
print(solution.largestGoodInteger("6777133339")) # Expect "777"
print(solution.largestGoodInteger("2300019")) # Expect "000"
print(solution.largestGoodInteger("42352338")) # Expect ""
