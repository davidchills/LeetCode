
"""
You are given an integer num. You will apply the following steps to num two separate times:
Pick a digit x (0 <= x <= 9).
Pick another digit y (0 <= y <= 9). Note y can be equal to x.
Replace all the occurrences of x in the decimal representation of num by y.
Let a and b be the two results from applying the operation to num independently.
Return the max difference between a and b.
Note that neither a nor b may have any leading zeros, and must not be 0.
"""
# 1432. Max Difference You Can Get From Changing an Integer
from typing import List
class Solution:
    def maxDiff(self, num: int) -> int:
        s = str(num)
        a = s
        for ch in s:
            if ch != '9':
                a = s.replace(ch, '9')
                break

        b = s
        if s[0] != '1':
            b = s.replace(s[0], '1')
        else:
            for ch in s[1:]:
                if ch not in ('0','1'):
                    b = s.replace(ch, '0')
                    break

        return int(a) - int(b)        
        
    
# Test Code
solution = Solution()
print(solution.maxDiff(555)) # Expect 888
print(solution.maxDiff(9)) # Expect 8