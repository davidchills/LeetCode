"""
You are given an array of variable pairs equations and an array of real numbers values, 
    where equations[i] = [Ai, Bi] and values[i] represent the equation Ai / Bi = values[i]. 
    Each Ai or Bi is a string that represents a single variable.
You are also given some queries, where queries[j] = [Cj, Dj] represents the jth query where you must find the answer for Cj / Dj = ?.
Return the answers to all queries. If a single answer cannot be determined, return -1.0.
Note: The input is always valid. You may assume that evaluating the queries 
    will not result in division by zero and that there is no contradiction.
Note: The variables that do not occur in the list of equations are undefined, so the answer cannot be determined for them.
"""
# 399. Evaluate Division
from typing import List
from collections import defaultdict, deque
import math
class Solution:
    def calcEquation(self, equations: List[List[str]], values: List[float], queries: List[List[str]]) -> List[float]:
        graph = defaultdict(dict)
        memo = {}
        
        for (A, B), value in zip(equations, values):
            graph[A][B] = value
            graph[B][A] = 1 / value
            
        def dfs(start, end, visited):
            if start not in graph or end not in graph:
                return -1.0
            if start == end:
                return 1.0
            if (start, end) in memo:
                return memo[(start, end)]

            visited.add(start)
            
            for neighbor, value in graph[start].items():
                if neighbor not in visited:
                    result = dfs(neighbor, end, visited)
                    if result != -1.0:
                        final_value = value * result
                        if math.isclose(final_value, 1.0, rel_tol=1e-9):
                            final_value = 1.0
                        memo[(start, end)] = final_value
                        return final_value

            return -1.0

        return [dfs(C, D, set()) for C, D in queries]

    
# Test Code
solution = Solution()
print(solution.calcEquation([["a","b"],["b","c"]], [2.0,3.0], [["a","c"],["b","a"],["a","e"],["a","a"],["x","x"]])) # Expect [6.00000,0.50000,-1.00000,1.00000,-1.00000]
print(solution.calcEquation([["a","b"]], [0.5], [["a","b"],["b","a"],["a","c"],["x","y"]])) # Expect [0.50000,2.00000,-1.00000,-1.00000]
print(solution.calcEquation([["a","b"],["b","c"],["bc","cd"]], [1.5,2.5,5.0], [["a","c"],["c","b"],["bc","cd"],["cd","bc"]])) # Expect [3.75000,0.40000,5.00000,0.20000] 
print(solution.calcEquation([["b","a"],["c","b"],["d","c"],["e","d"],["f","e"],["g","f"],["h","g"],["i","h"],["j","i"],["k","j"],["k","l"],["l","m"],["m","n"],["n","o"],["o","p"],["p","q"],["q","r"],["r","s"],["s","t"],["t","u"]], [1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05,1e-05], [["a","u"]])) # Expect [1.000] 
