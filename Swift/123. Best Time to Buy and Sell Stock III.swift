/*
You are given an array prices where prices[i] is the price of a given stock on the ith day.
Find the maximum profit you can achieve. You may complete at most two transactions.
Note: You may not engage in multiple transactions simultaneously (i.e., you must sell the stock before you buy again).
Constraints:
1 <= prices.length <= 10^5
0 <= prices[i] <= 10^5
    
123. Best Time to Buy and Sell Stock III    
*/
class Solution {
    func maxProfit(_ prices: [Int]) -> Int {
        var firstBuy = Int.max
        var secondBuy = Int.max
        var firstProfit = 0
        var secondProfit = 0
        
        for price in prices {
            if price < firstBuy {
                firstBuy = price
            }
            if price - firstBuy > firstProfit {
                firstProfit = price - firstBuy
            }
            
            let costSecond = price - firstProfit
            if costSecond < secondBuy {
                secondBuy = costSecond
            }
            if price - secondBuy > secondProfit {
                secondProfit = price - secondBuy
            }
        }
        return secondProfit
    }
}
/*
found this solution and it look pretty excellent
        var firstBuy = Int.min, firstSell = Int.min, secondBuy = Int.min, secondSell = Int.min

        for i in 0..<prices.count {
            firstBuy = max(firstBuy, -prices[i])
            firstSell = max(firstSell, firstBuy + prices[i])
            secondBuy = max(secondBuy, firstSell - prices[i])
            secondSell = max(secondSell, secondBuy + prices[i])
        }

        return secondSell
*/
let solution = Solution()
print(solution.maxProfit([3,3,5,0,0,3,1,4])) // Expect 6
print(solution.maxProfit([1,2,3,4,5]))  // Expect 4
print(solution.maxProfit([7,6,4,3,1]))  // Expect 0