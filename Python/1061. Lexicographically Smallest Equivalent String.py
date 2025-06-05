"""
You are given two strings of the same length s1 and s2 and a string baseStr.
We say s1[i] and s2[i] are equivalent characters.
For example, if s1 = "abc" and s2 = "cde", then we have 'a' == 'c', 'b' == 'd', and 'c' == 'e'.
Equivalent characters follow the usual rules of any equivalence relation:
Reflexivity: 'a' == 'a'.
Symmetry: 'a' == 'b' implies 'b' == 'a'.
Transitivity: 'a' == 'b' and 'b' == 'c' implies 'a' == 'c'.
For example, given the equivalency information from s1 = "abc" and s2 = "cde", "acd" and "aab" 
    are equivalent strings of baseStr = "eed", and "aab" is the lexicographically smallest equivalent string of baseStr.
Return the lexicographically smallest equivalent string of baseStr by using the equivalency information from s1 and s2.
"""
# 1061. Lexicographically Smallest Equivalent String
class Solution:
    def smallestEquivalentString(self, s1: str, s2: str, baseStr: str) -> str:
        parent = list(range(26))

        def find(x: int) -> int:
            if parent[x] != x:
                parent[x] = find(parent[x])
            return parent[x]

        def union(a: int, b: int) -> None:
            ra = find(a)
            rb = find(b)
            if ra == rb:
                return

            if ra < rb:
                parent[rb] = ra
            else:
                parent[ra] = rb

        for c1, c2 in zip(s1, s2):
            union(ord(c1) - ord('a'), ord(c2) - ord('a'))

        ansChars = []
        for ch in baseStr:
            root = find(ord(ch) - ord('a'))
            ansChars.append(chr(root + ord('a')))

        return "".join(ansChars)        
        
    
# Test Code
solution = Solution()
print(solution.smallestEquivalentString("parker", "morris", "parser")) # Expect "makkek"
print(solution.smallestEquivalentString("hello", "world", "hold")) # Expect "hdld"
print(solution.smallestEquivalentString("leetcode", "programs", "sourcecode")) # Expect "aauaaaaada"
