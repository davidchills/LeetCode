"""
Two strings are considered close if you can attain one from the other using the following operations:
Operation 1: Swap any two existing characters.
For example, abcde -> aecdb
Operation 2: Transform every occurrence of one existing character into another existing character, and do the same with the other character.
For example, aacabb -> bbcbaa (all a's turn into b's, and all b's turn into a's)
You can use the operations on either string as many times as necessary.
Given two strings, word1 and word2, return true if word1 and word2 are close, and false otherwise.
"""
# 1657. Determine if Two Strings Are Close
class Solution:
    def closeStrings(self, word1: str, word2: str) -> bool:
        if len(word1) != len(word2):
            return False
        
        freq1 = [0] * 26
        freq2 = [0] * 26
        
        for i in range(0, len(word1)):
            freq1[ord(word1[i]) - ord('a')] += 1
            freq2[ord(word2[i]) - ord('a')] += 1
        
        charSet1 = {chr(i + ord('a')) for i in range(26) if freq1[i] > 0}
        charSet2 = {chr(i + ord('a')) for i in range(26) if freq2[i] > 0}
                
        if charSet1 != charSet2:
            return False
        
        freq1.sort()
        freq2.sort()
        
        return freq1 == freq2
        
# Test Code
solution = Solution()
print(solution.closeStrings("abc", "bca")) # Expect True
print(solution.closeStrings("a", "aa")) # Expect True
print(solution.closeStrings("cabbba", "abbccc")) # Expect False
