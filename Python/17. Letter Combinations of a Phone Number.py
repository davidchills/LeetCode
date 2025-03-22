"""
Given a string containing digits from 2-9 inclusive, return all possible letter combinations that the number could represent. 
    Return the answer in any order.
A mapping of digits to letters (just like on the telephone buttons) is given below. Note that 1 does not map to any letters.
"""
# 17. Letter Combinations of a Phone Number
from typing import List
class Solution:
    def letterCombinations(self, digits: str) -> List[str]:
        if digits == "" or digits == "1":
            return []
        
        self.buttonMap = {
            "2": ["a","b","c"],
            "3": ["d","e","f"],
            "4": ["g","h","i"],
            "5": ["j","k","l"],
            "6": ["m","n","o"],
            "7": ["p","q","r","s"],
            "8": ["t","u","v"],
            "9": ["w","x","y","z"]
        }

        self.result = []
        
        self.backtrack(digits, 0, "")
        
        return self.result
    
    def backtrack(self, digits: str, index: int, currentCombination: str):
        if index == len(digits):
            self.result.append(currentCombination)
            return
        
        digit = digits[index]
        if digit not in self.buttonMap:
            return
        
        for letter in self.buttonMap[digit]:
            self.backtrack(digits, index + 1, currentCombination + letter)
        

    
# Test Code
solution = Solution()
print(solution.letterCombinations("23")) # Expect ["ad","ae","af","bd","be","bf","cd","ce","cf"]
print(solution.letterCombinations("")) # Expect []
print(solution.letterCombinations("2")) # Expect ["a","b","c"]