/*
A transformation sequence from word beginWord to word endWord using a dictionary wordList is a sequence of words 
    beginWord -> s1 -> s2 -> ... -> sk such that:
Every adjacent pair of words differs by a single letter.
Every si for 1 <= i <= k is in wordList. Note that beginWord does not need to be in wordList.
sk == endWord
Given two words, beginWord and endWord, and a dictionary wordList, 
    return the number of words in the shortest transformation sequence from beginWord to endWord, or 0 if no such sequence exists.

    
127. Word Ladder    
*/
import Foundation
class Solution {
    func ladderLength(_ beginWord: String, _ endWord: String, _ wordList: [String]) -> Int {
        var wordSet = Set(wordList);
        if !wordSet.contains(endWord) {
            return 0
        } 
        var queue: [(String, Int)] = [(beginWord, 1)]
        while !queue.isEmpty {
            let (currentWord, steps) = queue.removeFirst()
            var wordArray = Array(currentWord)
            for i in wordArray.indices {
                let originalChar = wordArray[i]
                for ch in "abcdefghijklmnopqrstuvwxyz" {
                    if ch == originalChar { continue }
                    wordArray[i] = ch
                    let newWord = String(wordArray)
                    if newWord == endWord {
                        return steps + 1
                    }
                    if wordSet.contains(newWord) {
                        wordSet.remove(newWord)
                        queue.append((newWord, steps + 1))
                    }
                }
                wordArray[i] = originalChar // Restore original character
            }
        }
        return 0        
    }
}
let solution = Solution()
print(solution.ladderLength("hit", "cog", ["hot","dot","dog","lot","log","cog"])); // Expect 5
print(solution.ladderLength("hit", "cog", ["hot","dot","dog","lot","log"])); // Expect 0