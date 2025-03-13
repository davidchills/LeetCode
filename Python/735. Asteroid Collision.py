"""
We are given an array asteroids of integers representing asteroids in a row. 
    The indices of the asteriod in the array represent their relative position in space.
For each asteroid, the absolute value represents its size, and the sign represents its direction (positive meaning right, negative meaning left). 
    Each asteroid moves at the same speed.
Find out the state of the asteroids after all collisions. If two asteroids meet, the smaller one will explode. 
    If both are the same size, both will explode. Two asteroids moving in the same direction will never meet.
"""
# 735. Asteroid Collision
from typing import List
class Solution:
    def asteroidCollision(self, asteroids: List[int]) -> List[int]:
        stack = []
        for rock in asteroids:
            while len(stack) != 0 and stack[len(stack) - 1] > 0 and rock < 0:
                last = stack.pop()
                if abs(last) == abs(rock):
                    rock = 0
                    break
                
                if abs(last) > abs(rock):
                    stack.append(last)
                    rock = 0
                    break
                
            if rock != 0:
                stack.append(rock)
                
        return stack
                
    
# Test Code
solution = Solution()
print(solution.asteroidCollision([5,10,-5])) # Expect [5,10]
print(solution.asteroidCollision([8,-8])) # Expect []
print(solution.asteroidCollision([10,2,-5])) # Expect [10]
print(solution.asteroidCollision([-2,-1,1,2])) # Expect [-2,-1,1,2]
print(solution.asteroidCollision([1,-2,-2,-2])) # Expect [-2,-2,-2]
print(solution.asteroidCollision([1, 2, 3, 4, 5])) # Expect [1, 2, 3, 4, 5]
print(solution.asteroidCollision([100])) # Expect [100]
print(solution.asteroidCollision([5, 10, -5, -10, 15, -20])) # Expect [-20]