"""
Given a positive integer n, there exists a 0-indexed array called powers, composed of the minimum number of powers of 2 that sum to n. 
The array is sorted in non-decreasing order, and there is only one way to form the array.
You are also given a 0-indexed 2D integer array queries, where queries[i] = [lefti, righti]. 
Each queries[i] represents a query where you have to find the product of all powers[j] with lefti <= j <= righti.
Return an array answers, equal in length to queries, where answers[i] is the answer to the ith query. Since the answer to the ith query may be too large, each answers[i] should be returned modulo 109 + 7.
"""
# 2438. Range Product Queries of Powers
from typing import List
class Solution:
    def productQueries(self, n: int, queries: List[List[int]]) -> List[int]:
        MOD = 10**9 + 7
        exps = []
        bit = 0
        while n:
            if n & 1:
                exps.append(bit)
            n >>= 1
            bit += 1

        # Prefix sums of exponents
        pref = [0]
        for e in exps:
            pref.append(pref[-1] + e)

        # Answer queries: product = 2^(sum of exponents in range) mod MOD
        ans = []
        for L, R in queries:
            s = pref[R + 1] - pref[L]
            ans.append(pow(2, s, MOD))
        return ans       

    
# Test Code
solution = Solution()
print(solution.productQueries(15, [[0,1],[2,2],[0,3]])) # Expect [2,4,64]
print(solution.productQueries(2, [[0,0]])) # Expect [2]
