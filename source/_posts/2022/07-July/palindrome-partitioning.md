---
extends: _layouts.post
section: content
title: Palindrome partitioning
problemUrl: https://leetcode.com/problems/palindrome-partitioning/
date: 2022-07-28
categories: [backtracking]
---

We will solve it through backtracking. We will check every possible substring, if it is palindrome, then we add it to the partition, when we are at the end of the string, we add it to the result. We will run it for every possible solution, and then return the result.

```python
class Solution:
    def partition(self, s: str) -> List[List[str]]:
        res, part = [], []

        def dfs(i):
            if i >= len(s):
                res.append(part.copy())
                return
            for j in range(i, len(s)):
                if self.isPalindrome(s, i, j):
                    part.append(s[i:j+1])
                    dfs(j+1)
                    part.pop()

        dfs(0)
        return res

    def isPalindrome(self, s: str, l: int, r: int) -> bool:
        while l < r:
            if s[l] != s[r]:
                return False
            l, r = l+1, r-1
        return True
```

Time Complexity: `O(2^n)` <br/>
Space Complexity: `O(2^n)`