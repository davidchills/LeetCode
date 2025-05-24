/*
You are given a 0-indexed array of strings words and a character x.
Return an array of indices representing the words that contain the character x.
Note that the returned array may be in any order.
    
2942. Find Words Containing Character    
*/
class Solution {
    func findWordsContaining(_ words: [String], _ x: Character) -> [Int] {
        /*
        var result: [Int] = []
        let n = words.count
        for i in 0..<n {
            if words[i].contains(x) {
                result.append(i)
            }
        }
        return result
        */
        return words.indices.filter { words[$0].contains(x) } 
    }
}
let solution = Solution()
print(solution.findWordsContaining(["leet","code"], "e")) // Expect [0,1]
print(solution.findWordsContaining(["abc","bcd","aaaa","cbc"], "a")) // Expect [0,2]
print(solution.findWordsContaining(["abc","bcd","aaaa","cbc"], "z")) // Expect []