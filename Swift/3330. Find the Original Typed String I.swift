/*
Alice is attempting to type a specific string on her computer. However, 
    she tends to be clumsy and may press a key for too long, resulting in a character being typed multiple times.
Although Alice tried to focus on her typing, she is aware that she may still have done this at most once.
You are given a string word, which represents the final output displayed on Alice's screen.
Return the total number of possible original strings that Alice might have intended to type.
    
3330. Find the Original Typed String I    
*/
class Solution {
    func possibleStringCount(_ word: String) -> Int {
        let letters = Array(word)
        let n = letters.count
        var run = 1
        var count = 1
        for i in 1..<n {
            if letters[i] == letters[i - 1] {
                run += 1
            }
            else {
                if run > 1 {
                    count += run - 1
                }
                run = 1
            }
        }
        if run > 1 {
            count += run - 1
        }
        
        return count
    }
}
let solution = Solution()
print(solution.possibleStringCount("abbcccc")) // Expect 5
print(solution.possibleStringCount("abcd")) // Expect 1
print(solution.possibleStringCount("aaaa")) // Expect 4