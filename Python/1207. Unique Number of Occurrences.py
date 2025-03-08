"""
Given an array of integers arr, return true if the number of occurrences of each value in the array is unique or false otherwise.
"""
# 1207. Unique Number of Occurrences
class Solution:
    def uniqueOccurrences(self, arr: list[int]) -> bool:
        freq = {}
        unique = set()
        for num in arr:
            freq[num] = freq.get(num, 0) + 1
        
        for value in freq.values():
            if value in unique:
                return False
            else:
                unique.add(value)
                
        return True

    
# Test Code
solution = Solution()
print(solution.uniqueOccurrences([1,2,2,1,1,3])) # Expect True
print(solution.uniqueOccurrences([1,2])) # Expect False
print(solution.uniqueOccurrences([-3,0,1,-3,1,1,1,-3,10,0])) # Expect True