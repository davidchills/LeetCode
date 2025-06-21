/*
You are given a string word and an integer k.
We consider word to be k-special if |freq(word[i]) - freq(word[j])| <= k for all indices i and j in the string.
Here, freq(x) denotes the frequency of the character x in word, and |y| denotes the absolute value of y.
Return the minimum number of characters you need to delete to make word k-special.
    
3085. Minimum Deletions to Make String K-Special    
*/
class Solution {
    func minimumDeletions(_ word: String, _ k: Int) -> Int {
        var counts: [Character:Int] = [:]
        for char in word {
            counts[char, default: 0] += 1
        }
        let freqs = Array(counts.values)
        
        func numDeletions(_ current: Int) -> Int {
            var result = 0
            for freq in freqs {
                if freq < current {
                    result += freq
                }
                if freq > current + k {
                    result += freq - current - k
                }
            }
            return result
        }
        let deletions = freqs.map{ numDeletions($0) }
        return deletions.min()!
    }
}
let solution = Solution()
print(solution.minimumDeletions("aabcaba", 0)) // Expect 3
print(solution.minimumDeletions("dabdcbdcdcd", 2)) // Expect 2
print(solution.minimumDeletions("aaabaaa", 2)) // Expect 1