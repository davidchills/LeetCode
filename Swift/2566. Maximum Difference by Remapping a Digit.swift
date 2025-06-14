/*
You are given an integer num. You know that Bob will sneakily remap one of the 10 possible digits (0 to 9) to another digit.
Return the difference between the maximum and minimum values Bob can make by remapping exactly one digit in num.
Notes:
When Bob remaps a digit d1 to another digit d2, Bob replaces all occurrences of d1 in num with d2.
Bob can remap a digit to itself, in which case num does not change.
Bob can remap different digits for obtaining minimum and maximum values respectively.
The resulting number after remapping can contain leading zeroes.
    
2566. Maximum Difference by Remapping a Digit    
*/
class Solution {
    func minMaxDifference(_ num: Int) -> Int {
        let digits = Array(String(num))
        
        var maxDigits = digits
        if let idx = digits.firstIndex(where: { $0 != "9" }) {
            let toReplace = digits[idx]
            for i in maxDigits.indices where maxDigits[i] == toReplace {
                maxDigits[i] = "9"
            }
        }

        var minDigits = digits
        if let idx = digits.firstIndex(where: { $0 != "0" }) {
            let toReplace = digits[idx]
            for i in minDigits.indices where minDigits[i] == toReplace {
                minDigits[i] = "0"
            }
        }

        
        return Int(String(maxDigits))! - Int(String(minDigits))!
    }
}
let solution = Solution()
print(solution.minMaxDifference(11891)) // Expect 99009
print(solution.minMaxDifference(90))  // Expect 99