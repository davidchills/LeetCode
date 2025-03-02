"""
Given a string s and an integer k, return the maximum number of vowel letters in any substring of s with length k.
Vowel letters in English are 'a', 'e', 'i', 'o', and 'u'.
"""
# 1456. Maximum Number of Vowels in a Substring of Given Length
class Solution:
    def maxVowels(self, s: str, k: int) -> int:
        n = len(s)
        if n < k:
            return 0
        
        vowels = {'a', 'e', 'i', 'o', 'u'}
        currVC = currVC = sum(map(lambda x: x in vowels, s[:k]))
        maxVC = currVC
        
        for i in range(k, n):
            currVC += (s[i] in vowels) - (s[i - k] in vowels)
            maxVC = max(maxVC, currVC)
            
        return maxVC
        
    
# Test Code
solution = Solution()
print(solution.maxVowels("abciiidef", 3)) # Expect 3
#print(solution.maxVowels("aeiou", 2)) # Expect 2
#print(solution.maxVowels("leetcode", 2)) # Expect 2