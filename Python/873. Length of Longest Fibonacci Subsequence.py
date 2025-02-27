"""
A sequence x1, x2, ..., xn is Fibonacci-like if:
    • n >= 3
    • xi + xi+1 == xi+2 for all i + 2 <= n
Given a strictly increasing array arr of positive integers forming a sequence, return the length of the longest 
    Fibonacci-like subsequence of arr. If one does not exist, return 0.
A subsequence is derived from another sequence arr by deleting any number of elements (including none) from arr, 
    without changing the order of the remaining elements. For example, [3, 5, 8] is a subsequence of [3, 4, 5, 6, 7, 8].
"""
# 873. Length of Longest Fibonacci Subsequence
class Solution:
    def lenLongestFibSubseq(self, arr: list[int]) -> int:
        n = len(arr)
        if n < 4:
            return 0
        keys = set(arr)
        longest = 0
        for i in range(n):
            for j in range(i+1, n):
                seq = 2
                a, b = arr[i], arr[j]
                while a + b in keys:
                    a, b = b, a + b
                    seq += 1
                    
                if seq > 2:
                    longest = max(longest, seq)
                
        return longest

    
# Test Code
solution = Solution()
#arr = [1,2,3,4,5,6,7,8] # Expect 5
#arr = [1,3,7,11,12,14,18] # Expect 3
#arr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17] # Expect 6
arr = [2,4,7,8,9,10,14,15,18,23,32,50] # Expect 5
print(solution.lenLongestFibSubseq(arr))