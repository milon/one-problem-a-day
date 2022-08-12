---
extends: _layouts.post
section: content
title: Interleaving string
problemUrl: https://leetcode.com/problems/interleaving-string/
date: 2022-08-12
categories: [dynamic-programming]
---

We will solve the problem with brute force recursively. We will run a DFS in our decision tree, if i and j is equal to the length of s1 and s2, then we return true. Otherwise we will take either a character from s1 or a character from s2, and call our DFS recursively. If any of the recursive call return true, then we will return true, otherwise we will return false. Finally we will memoize the result to solve it efficiently.

```python
class Solution:
    def isInterleave(self, s1: str, s2: str, s3: str) -> bool:
        if len(s1) + len(s2) != len(s3):
            return False
        
        def _isInterleave(i: int, j: int, memo: dict) -> bool:
            if (i, j) in memo:
                return memo[(i, j)]
            
            if i == len(s1) and j == len(s2):
                return True
            
            choose_s1, choose_s2 = False, False
            if i < len(s1) and s1[i] == s3[i+j]:
                choose_s1 = _isInterleave(i+1, j, memo)
            if j < len(s2) and s2[j] == s3[i+j]:
                choose_s2 = _isInterleave(i, j+1, memo)
            
            memo[(i, j)] = choose_s1 or choose_s2
            return memo[(i, j)]
        
        return _isInterleave(0, 0, {})
```

Time Complexity: `O(n*m)`, n is the length of s1, m is the length of s2. <br/>
Space Complexity: `O(n*m)`