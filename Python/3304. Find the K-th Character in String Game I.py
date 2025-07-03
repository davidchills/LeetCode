"""
Alice and Bob are playing a game. Initially, Alice has a string word = "a".
You are given a positive integer k.
Now Bob will ask Alice to perform the following operation forever:
Generate a new string by changing each character in word to its next character in the English alphabet, and append it to the original word.
For example, performing the operation on "c" generates "cd" and performing the operation on "zb" generates "zbac".
Return the value of the kth character in word, after enough operations have been done for word to have at least k characters.
Note that the character 'z' can be changed to 'a' in the operation.
"""
# 3304. Find the K-th Character in String Game I
class Solution:
    def kthCharacter(self, k: int) -> str:
        lengths = [1]
        while lengths[-1] < k:
            lengths.append(lengths[-1] * 2)
        
        def char_at(level: int, idx: int) -> str:
            if level == 0:
                return 'a'
            half = lengths[level-1]
            if idx <= half:
                return char_at(level-1, idx)
            else:
                c = char_at(level-1, idx - half)
                return chr((ord(c) - ord('a') + 1) % 26 + ord('a'))
        
        n = len(lengths) - 1
        return char_at(n, k)       

    
# Test Code
solution = Solution()
print(solution.kthCharacter(5)) # Expect "b"
print(solution.kthCharacter(10)) # Expect "c"

