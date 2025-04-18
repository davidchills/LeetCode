"""
The count-and-say sequence is a sequence of digit strings defined by the recursive formula:
countAndSay(1) = "1"
countAndSay(n) is the run-length encoding of countAndSay(n - 1).
Run-length encoding (RLE) is a string compression method that works by replacing consecutive identical characters 
    (repeated 2 or more times) with the concatenation of the character and the number marking the count of the characters 
    (length of the run). For example, 
    to compress the string "3322251" we replace "33" with "23", replace "222" with "32", replace "5" with "15" and replace "1" with "11". 
Thus the compressed string becomes "23321511".
Given a positive integer n, return the nth element of the count-and-say sequence.
"""
# 38. Count and Say
class Solution:
    def countAndSay(self, n: int) -> str:
        s = "1"
        for _ in range(n - 1):
            s = self._rle(s)
        return s
    
    def _rle(self, s: str) -> str:
        # Run-length encode s: consecutive runs -> "<count><digit>"
        res = []
        i = 0
        while i < len(s):
            cnt = 1
            while i + 1 < len(s) and s[i] == s[i + 1]:
                cnt += 1
                i += 1
            res.append(str(cnt))
            res.append(s[i])
            i += 1
        return "".join(res)        
    
# Test Code
solution = Solution()
print(solution.countAndSay(4)) # Expect "1211"
print(solution.countAndSay(1)) # Expect "1"
