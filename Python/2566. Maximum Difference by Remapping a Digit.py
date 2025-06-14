"""
You are given an integer num. You know that Bob will sneakily remap one of the 10 possible digits (0 to 9) to another digit.
Return the difference between the maximum and minimum values Bob can make by remapping exactly one digit in num.
Notes:
When Bob remaps a digit d1 to another digit d2, Bob replaces all occurrences of d1 in num with d2.
Bob can remap a digit to itself, in which case num does not change.
Bob can remap different digits for obtaining minimum and maximum values respectively.
The resulting number after remapping can contain leading zeroes.
"""
# 2566. Maximum Difference by Remapping a Digit
class Solution:
    def minMaxDifference(self, num: int) -> int:
        lowValue = str(num)
        highValue = str(num)
        
        for digit in highValue:
            if digit != '9':
                highValue = highValue.replace(digit, '9')
                break
            
        for digit in lowValue:
            if digit != '0':
                lowValue= lowValue.replace(digit, '0')
                break
            
            
        return int(highValue) - int(lowValue)
            
        
# Test Code
solution = Solution()
print(solution.minMaxDifference(11891)) # Expect 99009
print(solution.minMaxDifference(90)) # Expect 99