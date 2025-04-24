"""
You are given an array prices where prices[i] is the price of a given stock on the ith day.
Find the maximum profit you can achieve. You may complete at most two transactions.
Note: You may not engage in multiple transactions simultaneously (i.e., you must sell the stock before you buy again).
Constraints:
1 <= prices.length <= 10^5
0 <= prices[i] <= 10^5
"""
# 123. Best Time to Buy and Sell Stock III
from typing import List
class Solution:
    def maxProfit(self, prices: List[int]) -> int:
        firstBuy = float('inf')
        secondBuy = float('inf')
        firstProfit = 0
        secondProfit = 0
        
        for price in prices:
            # Minimize cost of first buy
            if price < firstBuy:
                firstBuy = price
            # Maximize profit of first sell
            if price - firstBuy > firstProfit:
                firstProfit = price - firstBuy
            
            # Effective cost of second buy: price minus what we already earned
            costSecond = price - firstProfit
            if costSecond < secondBuy:
                secondBuy = costSecond
            # Maximize profit after second sell
            if price - secondBuy > secondProfit:
                secondProfit = price - secondBuy
        
        return secondProfit        
        
    
# Test Code
solution = Solution()
print(solution.maxProfit([3,3,5,0,0,3,1,4])) # Expect 6
print(solution.maxProfit([1,2,3,4,5])) # Expect 4
print(solution.maxProfit([7,6,4,3,1])) # Expect 0
