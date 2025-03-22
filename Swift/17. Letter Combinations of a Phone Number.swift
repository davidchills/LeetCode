/*
Given a string containing digits from 2-9 inclusive, return all possible letter combinations that the number could represent. 
    Return the answer in any order.
A mapping of digits to letters (just like on the telephone buttons) is given below. Note that 1 does not map to any letters.
    
17. Letter Combinations of a Phone Number    
*/
class Solution {
    func letterCombinations(_ digits: String) -> [String] {
        if digits.isEmpty { return [] }
        let mapping: [Character: [String]] = [
            "2": ["a", "b", "c"],
            "3": ["d", "e", "f"],
            "4": ["g", "h", "i"],
            "5": ["j", "k", "l"],
            "6": ["m", "n", "o"],
            "7": ["p", "q", "r", "s"],
            "8": ["t", "u", "v"],
            "9": ["w", "x", "y", "z"]
        ]
        
        var result = [String]()
        var currentCombination = ""
        let digitsArray = Array(digits)
        
        func backtrack(_ index: Int) {
            if index == digitsArray.count {
                result.append(currentCombination)
                return
            }
            
            let digit = digitsArray[index]
            guard let letters = mapping[digit] else { return }
            for letter in letters {
                currentCombination.append(letter)
                backtrack(index + 1)
                currentCombination.removeLast()  // Backtrack
            }
        }
        
        backtrack(0)
        return result
    }
}
let solution = Solution()
print(solution.letterCombinations("23")) // Expect ["ad","ae","af","bd","be","bf","cd","ce","cf"]
print(solution.letterCombinations(""))  // Expect []
print(solution.letterCombinations("2"))  // Expect ["a","b,"c"]