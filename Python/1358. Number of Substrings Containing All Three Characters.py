"""
Given a string s consisting only of characters a, b and c.
Return the number of substrings containing at least one occurrence of all these characters a, b and c.
"""
# 1358. Number of Substrings Containing All Three Characters
class Solution:
    def numberOfSubstrings(self, s: str) -> int:
        n = len(s)
        ltrs = {"a": 0, "b": 0, "c": 0}
        subs = 0
        left = 0
        
        for right in range(n):
            ltrs[s[right]] += 1
            while ltrs['a'] > 0 and ltrs['b'] > 0 and ltrs['c'] > 0:
            #while all(ltrs.values()):
                subs += n - right
                ltrs[s[left]] -= 1
                left += 1
                
        return subs

    
# Test Code
solution = Solution()
print(solution.numberOfSubstrings("abcabc")) # Expect 10
print(solution.numberOfSubstrings("aaacb")) # Expect 3
print(solution.numberOfSubstrings("abc")) # Expect 1