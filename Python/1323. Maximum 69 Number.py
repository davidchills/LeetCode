"""
You are given a positive integer num consisting only of digits 6 and 9.
Return the maximum number you can get by changing at most one digit (6 becomes 9, and 9 becomes 6).
"""
# 1323. Maximum 69 Number
class Solution:
    def maximum69Number (self, num: int) -> int:
        num_str = str(num)
        for i in range(len(num_str)):
            if num_str[i] == '6':
                return int(num_str[:i] + '9' + num_str[i+1:])
        return num

    
# Test Code
solution = Solution()
print(solution.maximum69Number(9669)) # Expect 9969
print(solution.maximum69Number(9996)) # Expect 9999
print(solution.maximum69Number(9999)) # Expect 9999
