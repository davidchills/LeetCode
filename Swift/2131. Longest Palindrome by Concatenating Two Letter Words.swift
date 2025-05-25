/*
You are given an array of strings words. Each element of words consists of two lowercase English letters.
Create the longest possible palindrome by selecting some elements from words and concatenating them in any order. 
Each element can be selected at most once.
Return the length of the longest palindrome that you can create. If it is impossible to create any palindrome, return 0.
A palindrome is a string that reads the same forward and backward.
    
2131. Longest Palindrome by Concatenating Two Letter Words    
*/
class Solution {
    func longestPalindrome(_ words: [String]) -> Int {
        var wordCount: [String: Int] = [:]
        var length = 0
        var hasMiddle = false        
        
        for word in words {
            wordCount[word, default: 0] += 1
        }
        
        for word in wordCount.keys {
            let reverseWord = String(word.reversed())
            
            if word == reverseWord {
                let pairs = wordCount[word]! / 2
                length += pairs * 4
                
                if wordCount[word]! % 2 == 1 && !hasMiddle {
                    hasMiddle = true
                    length += 2
                }
            }
            else if word < reverseWord && wordCount[reverseWord] != nil {
                let pairs = min(wordCount[word]!, wordCount[reverseWord]!)
                length += pairs * 4
            }
        }
        
        return length        
    }
}
let solution = Solution()
print(solution.longestPalindrome(["lc","cl","gg"])) // Expect 6
print(solution.longestPalindrome(["ab","ty","yt","lc","cl","ab"]))  // Expect 8
print(solution.longestPalindrome(["cc","ll","xx"]))  // Expect 2
print(solution.longestPalindrome(["qo","fo","fq","qf","fo","ff","qq","qf","of","of","oo","of","of","qf","qf","of"]))  // Expect 14
print(solution.longestPalindrome(["dd","aa","bb","dd","aa","dd","bb","dd","aa","cc","bb","cc","dd","cc"]))  // Expect 22