/*
You are given a string s and a robot that currently holds an empty string t. 
Apply one of the following operations until s and t are both empty:
Remove the first character of a string s and give it to the robot. The robot will append this character to the string t.
Remove the last character of a string t and give it to the robot. The robot will write this character on paper.
Return the lexicographically smallest string that can be written on the paper.
    
2434. Using a Robot to Print the Lexicographically Smallest String    
*/
class Solution {
    func robotWithString(_ s: String) -> String {
        let n = s.count
        if n == 0 { return "" }
        let sStack = Array(s)
        var tStack = [Character]()
        var pStack = [Character]()
        var suffixMin = [Character](repeating: " ", count: n)
        suffixMin[n - 1] = sStack[n - 1]
        
        for i in stride(from: n - 2, through: 0, by: -1) {
            suffixMin[i] = min(sStack[i], suffixMin[i + 1])
        }
        
        var i = 0
        while i < n {
            if sStack[i] == suffixMin[i] {
                pStack.append(sStack[i])
                i += 1
                while let top = tStack.last,  (i == n || top <= suffixMin[i]) {
                    pStack.append(top)
                    tStack.removeLast()
                }
            }
            else {
                tStack.append(sStack[i])
                i += 1
            }
        }
        
        while let top = tStack.last {
            pStack.append(top)
            tStack.removeLast()
        }
        
        return String(pStack)
    }
}
let solution = Solution()
print(solution.robotWithString("zza")) // Expect "azz"
print(solution.robotWithString("bac"))  // Expect "abc"
print(solution.robotWithString("bdda"))  // Expect "addb"
print(solution.robotWithString("bydizfve"))  // Expect "bdevfziy"