/*
Given two strings word1 and word2, return the minimum number of operations required to convert word1 to word2.
You have the following three operations permitted on a word:
Insert a character
Delete a character
Replace a character
    
72. Edit Distance    
*/
class Solution {
    func minDistance(_ word1: String, _ word2: String) -> Int {
        let arr1 = Array(word1)
        let arr2 = Array(word2)
        let length1 = arr1.count
        let length2 = arr2.count        
        var dp = Array(
            repeating: Array(repeating: 0, count: length2 + 1),
            count: length1 + 1
        )
        
        for i in 0...length1 {
            dp[i][0] = i
        }
        for j in 0...length2 {
            dp[0][j] = j
        }
        
        for i in 1..<length1 + 1 {
            for j in 1..<length2 + 1 {
                if arr1[i - 1] == arr2[j - 1] {
                    dp[i][j] = dp[i - 1][j - 1]
                } 
                else {
                    let deleteCost  = dp[i - 1][j]     + 1
                    let insertCost  = dp[i][j - 1]     + 1
                    let replaceCost = dp[i - 1][j - 1] + 1
                    dp[i][j] = min(deleteCost, insertCost, replaceCost)
                }
            }
        }
        return dp[length1][length2]
    }
}
let solution = Solution()
print(solution.minDistance("horse", "ros")) // Expect 3
print(solution.minDistance("intention", "execution")) // Expect 5
print(solution.minDistance("", "")) // Expect 0