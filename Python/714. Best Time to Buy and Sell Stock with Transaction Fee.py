"""
You are given an array prices where prices[i] is the price of a given stock on the ith day, and an integer fee representing a transaction fee.
Find the maximum profit you can achieve. You may complete as many transactions as you like, 
    but you need to pay the transaction fee for each transaction.
Note:
You may not engage in multiple transactions simultaneously (i.e., you must sell the stock before you buy again).
The transaction fee is only charged once for each stock purchase and sale.
"""
# 714. Best Time to Buy and Sell Stock with Transaction Fee
from typing import List
class Solution:
    def maxProfit(self, prices: List[int], fee: int) -> int:
        if not prices:
            return 0

        cash = 0 
        hold = -prices[0]
        
        for price in prices[1:]:
            cash = max(cash, hold + price - fee)
            hold = max(hold, cash - price)
        
        return cash    
    
# Test Code
solution = Solution()
print(solution.maxProfit([1,3,2,8,4,9], 2)) # Expect 8
print(solution.maxProfit([1,3,7,5,10,3], 3)) # Expect 6
