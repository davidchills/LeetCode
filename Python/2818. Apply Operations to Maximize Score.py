"""
You are given an array nums of n positive integers and an integer k.
Initially, you start with a score of 1. You have to maximize your score by applying the following operation at most k times:
Choose any non-empty subarray nums[l, ..., r] that you haven't chosen previously.
Choose an element x of nums[l, ..., r] with the highest prime score. If multiple such elements exist, choose the one with the smallest index.
Multiply your score by x.
Here, nums[l, ..., r] denotes the subarray of nums starting at index l and ending at the index r, both ends being inclusive.
The prime score of an integer x is equal to the number of distinct prime factors of x. 
    For example, the prime score of 300 is 3 since 300 = 2 * 2 * 3 * 5 * 5.
Return the maximum possible score after applying at most k operations.
Since the answer may be large, return it modulo 109 + 7.
"""
# 2818. Apply Operations to Maximize Score
from typing import List
from math import isqrt
from collections import deque

MOD = 10**9 + 7

class Solution:
    def maximumScore(self, nums: List[int], k: int) -> int:
        n = len(nums)
        
        # Step 1: Prime scores
        def count_distinct_primes(x):
            count = 0
            if x % 2 == 0:
                count += 1
                while x % 2 == 0:
                    x //= 2
            for i in range(3, isqrt(x) + 1, 2):
                if x % i == 0:
                    count += 1
                    while x % i == 0:
                        x //= i
            if x > 1:
                count += 1
            return count
        
        prime_scores = [count_distinct_primes(num) for num in nums]

        # Step 2: Find boundaries using monotonic stack
        left = [-1] * n
        right = [n] * n
        stack = deque()

        for i in range(n):
            while stack and prime_scores[stack[-1]] < prime_scores[i]:
                idx = stack.pop()
                right[idx] = i
            left[i] = stack[-1] if stack else -1
            stack.append(i)

        # Step 3: Sort indices by nums[i] in descending order
        indices = list(range(n))
        indices.sort(key=lambda i: -nums[i])

        # Step 4: Greedy pick
        def mod_pow(x, y):
            res = 1
            x %= MOD
            while y:
                if y % 2:
                    res = res * x % MOD
                x = x * x % MOD
                y //= 2
            return res

        score = 1
        for i in indices:
            count = (i - left[i]) * (right[i] - i)
            use = min(k, count)
            score = score * mod_pow(nums[i], use) % MOD
            k -= use
            if k == 0:
                break

        return score
    
    
# Test Code
solution = Solution()
print(solution.maximumScore([8,3,9,3,8], 2)) # Expect 81
print(solution.maximumScore([19,12,14,6,10,18], 3)) # Expect 4788