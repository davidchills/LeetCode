"""
You are given three integers start, finish, and limit. You are also given a 0-indexed string s representing a positive integer.
A positive integer x is called powerful if it ends with s (in other words, s is a suffix of x) and each digit in x is at most limit.
Return the total number of powerful integers in the range [start..finish].
A string x is a suffix of a string y if and only if x is a 
substring of y that starts from some index (including 0) in y and extends to the index y.length - 1. 
For example, 25 is a suffix of 5125 whereas 512 is not.
"""
# 2999. Count the Number of Powerful Integers
class Solution:
    def numberOfPowerfulInt(self, start: int, finish: int, limit: int, s: str) -> int:
        cnt = [0] * 16
        def count(n : str, s: str) -> int:
            res, i, sz = cnt[len(n) - 1], 0, len(n) - len(s)
            while True:
                res += n[i:] >= s if i == sz else cnt[len(n) - i - 1] * (min(limit, int(n[i]) - 1) + (i > 0))
                i += 1
                if i > sz or int(n[i - 1]) > limit:
                    break
            return res            
        for i in range(len(s), 16):
            cnt[i] = 1 if i == len(s) else cnt[i - 1] * (limit + 1)
        return count(str(finish), s) - count(str(start - 1), s)
        
    
# Test Code
solution = Solution()
print(solution.numberOfPowerfulInt(1, 6000, 4, "124")) # Expect 5
print(solution.numberOfPowerfulInt(15, 215, 6, "10")) # Expect 2
print(solution.numberOfPowerfulInt(1000, 2000, 4, "3000")) # Expect 0
print(solution.numberOfPowerfulInt(15398, 1424153842, 8, "703")) # Expect 783791