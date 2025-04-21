"""
You are given an integer array coins representing coins of different denominations and an integer amount representing a total amount of money.
Return the fewest number of coins that you need to make up that amount. 
If that amount of money cannot be made up by any combination of the coins, return -1.
You may assume that you have an infinite number of each kind of coin.
"""
# 322. Coin Change
from typing import List
class Solution:
    def coinChange(self, coins: List[int], amount: int) -> int:
        if amount == 0:
            return 0
        
        tooMuch = amount + 1
        dp = [tooMuch] * (amount + 1)
        dp[0] = 0
        
        for coin in coins:
            for i in range(coin, amount + 1):
                dp[i] = min(dp[i], dp[i - coin] + 1)
                
        if dp[amount] == tooMuch:
            return -1
        else:
            return dp[amount]
        
    
# Test Code
solution = Solution()
print(solution.coinChange([1,2,5], 11)) # Expect 3
print(solution.coinChange([2], 3)) # Expect -1
print(solution.coinChange([1], 0)) # Expect 0
print(solution.coinChange([2], 1)) # Expect -1

