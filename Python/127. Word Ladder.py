"""
A transformation sequence from word beginWord to word endWord using a dictionary wordList is a sequence of words 
    beginWord -> s1 -> s2 -> ... -> sk such that:
Every adjacent pair of words differs by a single letter.
Every si for 1 <= i <= k is in wordList. Note that beginWord does not need to be in wordList.
sk == endWord
Given two words, beginWord and endWord, and a dictionary wordList, 
    return the number of words in the shortest transformation sequence from beginWord to endWord, or 0 if no such sequence exists.
"""
# 127. Word Ladder
from typing import List
from collections import deque
class Solution:
    def ladderLength(self, beginWord: str, endWord: str, wordList: List[str]) -> int:
        wordSet = set(wordList)
        if endWord not in wordSet:
            return 0
        
        queue = deque([[beginWord, 1]])
        while queue:
            currentWord, steps = queue.popleft()
            word = list(currentWord)
            for i in range(len(word)):
                originalChar = word[i]
                for ch in "abcdefghijklmnopqrstuvwxyz":
                    if ch == originalChar:
                        continue
                    
                    word[i] = ch
                    newWord = "".join(word)
                    
                    if newWord == endWord:
                        return steps + 1
                    if newWord in wordSet:
                        wordSet.remove(newWord)
                        queue.append([newWord, steps + 1])
                        
                word[i] = originalChar
                
        return 0
        
    
# Test Code
solution = Solution()
print(solution.ladderLength("hit", "cog", ["hot","dot","dog","lot","log","cog"])) # Expect 5
print(solution.ladderLength("hit", "cog", ["hot","dot","dog","lot","log"])) # Expect 0
