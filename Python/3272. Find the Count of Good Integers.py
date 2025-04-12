"""
You are given two positive integers n and k.
An integer x is called k-palindromic if:
x is a palindrome.
x is divisible by k.
An integer is called good if its digits can be rearranged to form a k-palindromic integer. 
For example, for k = 2, 2020 can be rearranged to form the k-palindromic integer 2002, 
whereas 1010 cannot be rearranged to form a k-palindromic integer.
Return the count of good integers containing n digits.
Note that any integer must not have leading zeros, neither before nor after rearrangement. 
For example, 1010 cannot be rearranged to form 101.
"""
# 3272. Find the Count of Good Integers
from collections import Counter
from math import factorial
class Solution:
    def countGoodIntegers(self, n: int, k: int) -> int:
        def generateNums(m):
            if m <= 0:
                return []

            start = 10**(m - 1)
            end = 10**m
            return list(range(start, end))

        palindromes = set()
        count = 0
        if n == 1:
            for i in range(1, 10):
                if i % k == 0:
                    count += 1
            return count

        m = n // 2
        nums = generateNums(m)
        
        #generate all even palindromes
        if n % 2 == 0: 
            for num in nums:
                palindrome = str(num) + str(num)[::-1]
                if int(palindrome) % k == 0:
                    cleaned_palindrome = ''.join(sorted(palindrome))
                    if cleaned_palindrome:  # Only add non-empty strings
                        palindromes.add(cleaned_palindrome)

        #generate all odd palindromes
        if n % 2 != 0: 
            for num in nums:
                for i in range(0, 10):
                    palindrome = str(num) + str(i) + str(num)[::-1]
                    if int(palindrome) % k == 0:
                        cleaned_palindrome = ''.join(sorted(palindrome))
                        if cleaned_palindrome:  # Only add non-empty strings
                            palindromes.add(cleaned_palindrome)

        #function to count all permutations of a string s that dont have leading 0s
        def countPermutations(s): 
            char_count = Counter(s)
            n = len(s)
            
            # Total permutations
            total_permutations = factorial(n)
            for count in char_count.values():
                total_permutations //= factorial(count)
            
            # If there's no '0', all permutations are valid
            if '0' not in char_count:
                return total_permutations
            
            # Calculate permutations that start with '0'
            char_count['0'] -= 1
            leading_zero_permutations = factorial(n - 1)
            for count in char_count.values():
                leading_zero_permutations //= factorial(count)
            
            # Subtract permutations with leading '0' from total permutations
            return total_permutations - leading_zero_permutations

        for pal in palindromes:
            count += countPermutations(pal)

        return count
    
# Test Code
solution = Solution()
print(solution.countGoodIntegers(3, 5)) # Expect 27
print(solution.countGoodIntegers(1, 4)) # Expect 2
print(solution.countGoodIntegers(5, 6)) # Expect 2468