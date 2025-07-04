"""
Alice and Bob are playing a game. Initially, Alice has a string word = "a".
You are given a positive integer k. You are also given an integer array operations, 
    where operations[i] represents the type of the ith operation.
Now Bob will ask Alice to perform all operations in sequence:
If operations[i] == 0, append a copy of word to itself.
If operations[i] == 1, generate a new string by changing each character in word to its next character in the English alphabet, 
    and append it to the original word. For example, 
    performing the operation on "c" generates "cd" and performing the operation on "zb" generates "zbac".
Return the value of the kth character in word after performing all the operations.
Note that the character 'z' can be changed to 'a' in the second type of operation.
"""
# 3307. Find the K-th Character in String Game II
from typing import List
import sys
sys.setrecursionlimit(10**7)
class Solution:
    def kthCharacter(self, k: int, operations: List[int]) -> str:
        # 1) Precompute lengths after each operation, capping at >k
        n = len(operations)
        lengths = [1] * (n + 1)   # lengths[i] = length after first i ops
        for i, op in enumerate(operations, start=1):
            # each op doubles the length
            lengths[i] = min(lengths[i-1] * 2, k)
        
        # 2) Recurse: find char after first i ops at 1-based index idx
        from functools import lru_cache
        @lru_cache(None)
        def char_after(i: int, idx: int) -> str:
            # if no ops, word == "a"
            if i == 0:
                return 'a'
            
            half = lengths[i-1]
            if idx <= half:
                # in the first copy
                return char_after(i-1, idx)
            else:
                # in the second copy
                c = char_after(i-1, idx - half)
                if operations[i-1] == 0:
                    # op type 0: second half is identical
                    return c
                else:
                    # op type 1: second half is shifted by +1
                    return chr((ord(c) - ord('a') + 1) % 26 + ord('a'))
        
        return char_after(n, k)       

    
# Test Code
solution = Solution()
print(solution.kthCharacter(5, [0,0,0])) # Expect "a"
print(solution.kthCharacter(10, [0,1,0,1])) # Expect "b"

