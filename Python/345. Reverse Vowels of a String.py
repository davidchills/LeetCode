"""
Given a string s, reverse only all the vowels in the string and return it.

The vowels are 'a', 'e', 'i', 'o', and 'u', and they can appear in both lower and upper cases, more than once.
"""
# 345. Reverse Vowels of a String
class Solution(object):
    def reverseVowels(self, s):
        """
        :type s: str
        :rtype: str
        """
        vowels = set("aeiouAEIOU")  # Define a set of vowels
        s = list(s)  # Convert string to a list for mutability
        left, right = 0, len(s) - 1  # Two pointers
        
        while left < right:
            # Move left pointer until a vowel is found
            while left < right and s[left] not in vowels:
                left += 1
            # Move right pointer until a vowel is found
            while left < right and s[right] not in vowels:
                right -= 1
            
            # Swap vowels
            s[left], s[right] = s[right], s[left]
            left += 1
            right -= 1
        
        return "".join(s) 
    
# Test Code

solution = Solution()

s = "leetcode" # Expect "leotcede"
#s = "IceCreAm" # Expect "AceCreIm"
print(solution.reverseVowels(s))