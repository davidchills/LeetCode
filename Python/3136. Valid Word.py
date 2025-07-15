"""
A word is considered valid if:
It contains a minimum of 3 characters.
It contains only digits (0-9), and English letters (uppercase and lowercase).
It includes at least one vowel.
It includes at least one consonant.
You are given a string word.
Return true if word is valid, otherwise, return false.
Notes:
'a', 'e', 'i', 'o', 'u', and their uppercases are vowels.
A consonant is an English letter that is not a vowel.
"""
# 3136. Valid Word
import re
class Solution:
    def isValid(self, word: str) -> bool:
        if len(word) < 3:
            return False
        elif re.search(r'[^0-9a-z]', word, re.IGNORECASE):
            return False
        elif not re.search(r'[aeiou]', word, re.IGNORECASE):
            return False
        elif not re.search(r'[bcdfghjklmnpqrstvwxyz]', word, re.IGNORECASE):
            return False
        else:
            return True
            

    
# Test Code
solution = Solution()
print(solution.isValid("234Adas")) # Expect True
print(solution.isValid("b3")) # Expect False
print(solution.isValid("a3$e")) # Expect False
print(solution.isValid("3pp")) # Expect False
