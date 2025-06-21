"""
You are given a string word and an integer k.
We consider word to be k-special if |freq(word[i]) - freq(word[j])| <= k for all indices i and j in the string.
Here, freq(x) denotes the frequency of the character x in word, and |y| denotes the absolute value of y.
Return the minimum number of characters you need to delete to make word k-special.
"""
# 3085. Minimum Deletions to Make String K-Special
from collections import Counter
class Solution:
    def minimumDeletions(self, word: str, k: int) -> int:
        freqs = list(Counter(word).values())
        
        def numDeletions(current: int) -> int:
            result = 0
            for num in freqs:
                if num < current:
                    result += num
                if num > current + k:
                    result += num - current - k
                    
            return result
        
        return min(map(numDeletions, freqs))


    
# Test Code
solution = Solution()
print(solution.minimumDeletions("aabcaba", 0)) # Expect 3
print(solution.minimumDeletions("dabdcbdcdcd", 2)) # Expect 2
print(solution.minimumDeletions("aaabaaa", 2)) # Expect 1
