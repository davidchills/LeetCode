/*
A fancy string is a string where no three consecutive characters are equal.
Given a string s, delete the minimum possible number of characters from s to make it fancy.
Return the final string after the deletion. It can be shown that the answer will always be unique.
    
1957. Delete Characters to Make Fancy String    
*/
class Solution {
    func makeFancyString(_ s: String) -> String {
        //let letters = Array(s)
        var ans = [Character]()
        for letter in s {
            let count = ans.count
            if count < 2 || !(ans[count - 1] == ans[count - 2] && ans[count - 1] == letter) {
                ans.append(letter)
            }
        }
        return String(ans)
    }
}
let solution = Solution()
print(solution.makeFancyString("leeetcode")) // Expect "leetcode"
print(solution.makeFancyString("aaabaaaa")) // Expect "aabaa"
print(solution.makeFancyString("aab")) // Expect "aab"