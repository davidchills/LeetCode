"""
Design an algorithm that collects daily price quotes for some stock and returns the span of that stock's price for the current day.
The span of the stock's price in one day is the maximum number of consecutive days 
    (starting from that day and going backward) for which the stock price was less than or equal to the price of that day.
For example, if the prices of the stock in the last four days is [7,2,1,2] and the price of the stock today is 2, 
    then the span of today is 4 because starting from today, the price of the stock was less than or equal 2 for 4 consecutive days.
Also, if the prices of the stock in the last four days is [7,34,1,2] and the price of the stock today is 8, then the span of today is 3 because starting from today, the price of the stock was less than or equal 8 for 3 consecutive days.
Implement the StockSpanner class:
StockSpanner() Initializes the object of the class.
int next(int price) Returns the span of the stock's price given that today's price is price.
"""
# 901. Online Stock Span
from typing import List
class StockSpanner:

    def __init__(self):
        self.stack = []

    def next(self, price: int) -> int:
        # Start with span = 1 (today itself)
        span = 1
        # Collapse all previous days with price <= today's
        while self.stack and self.stack[-1][0] <= price:
            span += self.stack[-1][1]
            self.stack.pop()
        # Push today's price and its span
        self.stack.append((price, span))
        return span
    
# Test Code
stockSpanner = StockSpanner();
print(stockSpanner.next(100)) # Expect 1
print(stockSpanner.next(80)) # Expect 1
print(stockSpanner.next(60)) # Expect 1
print(stockSpanner.next(70)) # Expect 2
print(stockSpanner.next(60)) # Expect 1
print(stockSpanner.next(75)) # Expect 4, because the last 4 prices (including today's price of 75) were less than or equal to today's price.
print(stockSpanner.next(85)) # Expect 6        
