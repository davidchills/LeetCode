"""
You are given a string word, and an integer numFriends.
Alice is organizing a game for her numFriends friends. There are multiple rounds in the game, where in each round:
• word is split into numFriends non-empty strings, such that no previous round has had the exact same split.
• All the split words are put into a box.
Find the lexicographically largest string from the box after all the rounds are finished.
"""
# 3403. Find the Lexicographically Largest String From the Box I
class Solution:
    def answerString(self, word: str, numFriends: int) -> str:
        n = len(word)
        m = n - numFriends + 1
        result = ""
        if numFriends == 1:
            return word
        
        for i in range(n):
            result = max(word[i:i + m], result)
            
        return result
        
    
# Test Code
solution = Solution()
print(solution.answerString("dbca", 2)) # Expect "dbc"
print(solution.answerString("gggg", 4)) # Expect "g"
print(solution.answerString("aann", 2)) # Expect "nn"