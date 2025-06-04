/*
You are given a string word, and an integer numFriends.
Alice is organizing a game for her numFriends friends. There are multiple rounds in the game, where in each round:
• word is split into numFriends non-empty strings, such that no previous round has had the exact same split.
• All the split words are put into a box.
Find the lexicographically largest string from the box after all the rounds are finished.
    
3403. Find the Lexicographically Largest String From the Box I    
*/
class Solution {
    func answerString(_ word: String, _ numFriends: Int) -> String {
        if numFriends == 1 { return word }
        let n = word.count
        let m = n - numFriends + 1
        let chars = Array(word)
        var result: [Character]? = nil
        
        guard m > 0 else { return "" }
        
        for i in 0..<n {
            let remaining = n - i
            let candidate = Array(chars[i..<i + min(m, remaining)])
            if result == nil || candidate.lexicographicallyPrecedes(result!) == false {
                result = candidate
            }
        }
        return String(result!)
    }
}
let solution = Solution()
print(solution.answerString("dbca", 2)) // Expect "dbc"
print(solution.answerString("gggg", 4))  // Expect "g"
print(solution.answerString("aann", 2))  // Expect "nn"