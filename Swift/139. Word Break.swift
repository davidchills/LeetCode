/*
Given a string s and a dictionary of strings wordDict, 
    return true if s can be segmented into a space-separated sequence of one or more dictionary words.
Note that the same word in the dictionary may be reused multiple times in the segmentation.
    
139. Word Break    
*/
class Solution {
    func wordBreak(_ s: String, _ wordDict: [String]) -> Bool {
        let n = s.count
        let wordSet = Set(wordDict)
        var dp = Array(repeating: false, count: n + 1)
        dp[0] = true
        let sChars = Array(s)
        
        for i in 0..<n {
            if !dp[i] { continue }
            for word in wordSet {
                let end = i + word.count
                if end <= n && String(sChars[i..<end]) == word {
                    dp[end] = true
                }
            }
            if dp[n] { return true }
        }
        return dp[n]
    }
}
let solution = Solution()
print(solution.wordBreak("leetcode", ["leet","code"])) // Expect true
print(solution.wordBreak("applepenapple", ["apple","pen"])) // Expect true
print(solution.wordBreak("catsandog", ["cats","dog","sand","and","cat"])) // Expect false