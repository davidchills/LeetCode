"""
You are given a string s of length n, and an integer k. You are tasked to find the longest subsequence repeated k times in string s.
A subsequence is a string that can be derived from another string by deleting some or 
    no characters without changing the order of the remaining characters.
A subsequence seq is repeated k times in the string s if seq * k is a subsequence of s, 
    where seq * k represents a string constructed by concatenating seq k times.
For example, "bba" is repeated 2 times in the string "bababcba", because the string "bbabba", constructed by concatenating "bba" 2 times, 
    is a subsequence of the string "bababcba".
Return the longest subsequence repeated k times in string s. If multiple such subsequences are found, return the lexicographically largest one. 
If there is no such subsequence, return an empty string.
"""
# 2014. Longest Subsequence Repeated k Times
class Solution:
    def longestSubsequenceRepeatedK(self, s: str, k: int) -> str:
        n = len(s)
        # build next_pos: next_pos[i][c] = min j >= i with s[j] = c, else -1
        # we'll map chars 'a'..'z' to 0..25
        ALPHA = 26
        next_pos = [[-1]*ALPHA for _ in range(n+1)]
        # at position n, no further chars
        for c in range(ALPHA):
            next_pos[n][c] = -1
        # scan backwards
        for i in range(n-1, -1, -1):
            for c in range(ALPHA):
                next_pos[i][c] = next_pos[i+1][c]
            next_pos[i][ord(s[i]) - ord('a')] = i
        
        def can_repeat(seq: str) -> bool:
            # try to match `seq` k times in s
            pos = 0
            for _ in range(k):
                for ch in seq:
                    c = ord(ch) - ord('a')
                    nxt = next_pos[pos][c]
                    if nxt == -1:
                        return False
                    pos = nxt + 1
                    if pos > n:
                        # out of string
                        return False
            return True
        
        # BFS‐style build all prefixes that can still be repeated k times
        # We only ever keep the current frontier of valid prefixes of length ℓ.
        # Once it becomes empty, ℓ-1 was the max length.
        frontier = [""]
        best = ""  # we'll record the lex‐largest among the longest
        while True:
            new_frontier = []
            # try every extension by 'a'..'z'
            for prefix in frontier:
                for c_ord in range(ALPHA):
                    ch = chr(c_ord + ord('a'))
                    candidate = prefix + ch
                    if can_repeat(candidate):
                        new_frontier.append(candidate)
            if not new_frontier:
                # no longer extensions possible
                break
            # keep only the new frontier; update best to the lex‐max of them
            frontier = new_frontier
            best = max(frontier)
        return best      

    
# Test Code
solution = Solution()
print(solution.longestSubsequenceRepeatedK("letsleetcode", 2)) # Expect "let"
print(solution.longestSubsequenceRepeatedK("bb", 2)) # Expect "b"
print(solution.longestSubsequenceRepeatedK("ab", 2)) # Expect ""
