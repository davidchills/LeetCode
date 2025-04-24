"""
You are given an array of strings products and a string searchWord.
Design a system that suggests at most three product names from products after each character of searchWord is typed. 
Suggested products should have common prefix with searchWord. 
If there are more than three products with a common prefix return the three lexicographically minimums products.
Return a list of lists of the suggested products after each character of searchWord is typed.
"""
# 1268. Search Suggestions System
from typing import List
import bisect
class Solution:
    def suggestedProducts(self, products: List[str], searchWord: str) -> List[List[str]]:
        products.sort()
        results = []
        prefix = ""
        
        for ch in searchWord:
            prefix += ch
            start = bisect.bisect_left(products, prefix)
            
            suggestions = []
            for i in range(start, min(start + 3, len(products))):
                if products[i].startswith(prefix):
                    suggestions.append(products[i])
                else:
                    break
            results.append(suggestions)
        
        return results        
        
    
# Test Code
solution = Solution()
print(solution.suggestedProducts(["mobile","mouse","moneypot","monitor","mousepad"], "mouse"))
# Expect 
"""
[["mobile","moneypot","monitor"],["mobile","moneypot","monitor"],["mouse","mousepad"],["mouse","mousepad"],["mouse","mousepad"]]
"""
print(solution.suggestedProducts(["havana"], "havana"))
# Expect
"""
[["havana"],["havana"],["havana"],["havana"],["havana"],["havana"]]
"""