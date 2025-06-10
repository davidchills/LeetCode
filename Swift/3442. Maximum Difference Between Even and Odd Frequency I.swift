/*
You are given a string s consisting of lowercase English letters.
Your task is to find the maximum difference diff = a1 - a2 between the frequency of characters a1 and a2 in the string such that:
a1 has an odd frequency in the string.
a2 has an even frequency in the string.
Return this maximum difference.
    
3442. Maximum Difference Between Even and Odd Frequency I    
*/
class Solution {
    func maxDifference(_ s: String) -> Int {
        var letterCount: [Character: Int] = [:]
        var odd = -1
        var even = Int.max
        /*
        for letter in Array(s) {
            letterCount[letter, default: 0] += 1
        }
        */
        
        for letter in s {
            letterCount[letter, default: 0] += 1
        }
        
        for freq in letterCount.values {
            if freq % 2 == 0 {
                even = min(even, freq)
            }
            else {
                odd = max(odd, freq)
            }
        }
        
        return odd - even
    }
}
let solution = Solution()
print(solution.maxDifference("aaaaabbc")) // Expect 3
print(solution.maxDifference("abcabcab"))  // Expect 1