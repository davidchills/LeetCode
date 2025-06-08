"""
Given an integer n, return all the numbers in the range [1, n] sorted in lexicographical order.
You must write an algorithm that runs in O(n) time and uses O(1) extra space. 
"""
# 386. Lexicographical Numbers
from typing import List
class Solution:
    def lexicalOrder(self, n: int) -> List[int]:
        result = []
        """
        # Not O(n) time or O(1) space, but it works and is fast.
        # Populate the list with the range as string values.
        for i in range(1, n + 1):
            result.append(str(i))
            
        # Sort the list as strings.
        result.sort()
        # return the list after mapping all the string values to integers.
        return list(map(lambda x: int(x), result))
        """
        # Trying for the math approach, trying for O(n) and O(1)
        current = 1

        for _ in range(n):
            # Append current value to the return result.
            result.append(current)
            # 1) Try to go lexicographically deeper (append a '0' digit)
            if current * 10 <= n:
                current *= 10
            else:
                # 2) Otherwise back up until we can increment
                while current % 10 == 9 or current + 1 > n:
                    # Use integer division.
                    current //= 10

                current += 1
                    
        return result
                
# Test Code
solution = Solution()
print(solution.lexicalOrder(13)) # Expect [1,10,11,12,13,2,3,4,5,6,7,8,9]
print(solution.lexicalOrder(2)) # Expect [1,2]
