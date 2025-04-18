/*
You are given an integer array coins representing coins of different denominations and an integer amount representing a total amount of money.
Return the fewest number of coins that you need to make up that amount. 
If that amount of money cannot be made up by any combination of the coins, return -1.
You may assume that you have an infinite number of each kind of coin.
    
322. Coin Change    
*/
class Solution {
    func coinChange(_ coins: [Int], _ amount: Int) -> Int {
        if amount == 0 { return 0 }
        let tooMuch = amount + 1
        var dp = Array(repeating: tooMuch, count: amount + 1)
        dp[0] = 0
        
        for coin in coins {
            for i in coin...(amount) {
                dp[i] = min(dp[i], dp[i - coin] + 1)
            }
        }
        return (dp[amount] == tooMuch) ? -1 : dp[amount]
    }
}
let solution = Solution()
print(solution.coinChange([1,2,5], 11)) // Expect 3
print(solution.coinChange([2], 3)) // Expect -1
print(solution.coinChange([1], 0)) // Expect 0