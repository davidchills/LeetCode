"""
You are given an integer array prices where prices[i] is the price of a given stock on the ith day, and an integer k.
Find the maximum profit you can achieve. You may complete at most k transactions: i.e. you may buy at most k times and sell at most k times.
Note: You may not engage in multiple transactions simultaneously (i.e., you must sell the stock before you buy again).
Constraints:
• 1 <= k <= 100
• 1 <= prices.length <= 1000
• 0 <= prices[i] <= 1000
"""
# 188. Best Time to Buy and Sell Stock IV
from typing import List
class Solution:
    def maxProfit(self, k: int, prices: List[int]) -> int:
        n = len(prices)
        if n <= 1 or k == 0:
            return 0
        
        # If k >= n/2, we can make as many transactions as we like
        if k >= n // 2:
            return sum(
                max(0, prices[i] - prices[i - 1])
                for i in range(1, n)
            )
        
        # buys[j]: max profit achievable after j-1 sells, then buying the j-th stock
        # sells[j]: max profit after completing j sells
        buys = [-float('inf')] * (k + 1)
        sells = [0] * (k + 1)
        
        for price in prices:
            for j in range(1, k + 1):
                # either keep previous buy, or buy now using profit from j-1 sells
                buys[j] = max(buys[j], sells[j-1] - price)
                # either keep previous sell, or sell now using profit from a buy
                sells[j] = max(sells[j], buys[j] + price)
        
        return sells[k]        
        
    
# Test Code
solution = Solution()
print(solution.maxProfit(2, [2,4,1])) # Expect 2
print(solution.maxProfit(2, [3,2,6,5,0,3])) # Expect 7
