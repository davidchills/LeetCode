"""
You are given a string word and a non-negative integer k.
Return the total number of substrings of word that contain every vowel ('a', 'e', 'i', 'o', and 'u') at least once and exactly k consonants.
"""
# 3306. Count of Substrings Containing Every Vowel and K Consonants II
class Solution:
    def countOfSubstrings(self, word: str, k: int) -> int:
        return self.atLeastK(word, k) - self.atLeastK(word, k + 1)
        
    def isVowel(self, char):
        return char in {'a','e','i','o','u'}
    
    def atLeastK(self, word, k):
        n = len(word)
        start = 0
        end = 0
        numValidateSubstrings = 0
        vowelCount = {}
        consonantCount = 0
        
        while end < n:
            newLetter = word[end]
            if self.isVowel(newLetter):
                vowelCount[newLetter] = vowelCount.get(newLetter, 0) + 1
            else:
                consonantCount += 1
                
            while len(vowelCount) == 5 and consonantCount >= k:
                numValidateSubstrings += n - end
                
                startLetter = word[start]
                if self.isVowel(startLetter):
                    vowelCount[startLetter] -= 1
                    if vowelCount[startLetter] == 0:
                        del vowelCount[startLetter]
                
                else:
                    consonantCount -= 1
                
                start += 1
                    
            end += 1
            
        return numValidateSubstrings

    
# Test Code
solution = Solution()
print(solution.countOfSubstrings("aeioqq", 1)) # Expect 0
print(solution.countOfSubstrings("aeiou", 0)) # Expect 1
print(solution.countOfSubstrings("ieaouqqieaouqq", 1)) # Expect 3