/*
You are given an integer array coins representing coins of different denominations and an integer amount representing a total amount of money.
Return the fewest number of coins that you need to make up that amount. 
If that amount of money cannot be made up by any combination of the coins, return -1.
You may assume that you have an infinite number of each kind of coin.
    
322. Coin Change    
*/
class Solution {
    func coinChange(_ coins: [Int], _ amount: Int) -> Int {
        let tooMuch = amount + 1
        var dp = [Int](repeating: tooMuch, count: amount + 1)
        dp[0] = 0
        
        for amt in 1..<dp.count {
            for coin in coins {
                if coin <= amt {
                    dp[amt] = min(dp[amt], dp[amt - coin] + 1)
                }
            }
        }
        
        return dp[amount] > amount ? -1 : dp[amount]       
    }
}
let solution = Solution()
print(solution.coinChange([1,2,5], 11)) // Expect 3
print(solution.coinChange([2], 3)) // Expect -1
print(solution.coinChange([1], 0)) // Expect 0
print(solution.coinChange([2], 1)) // Expect -1