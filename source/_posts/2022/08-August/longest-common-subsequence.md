---
extends: _layouts.post
section: content
title: Longest common subsequence
problemUrl: https://leetcode.com/problems/longest-common-subsequence/
date: 2022-08-12
categories: [dynamic-programming]
---

We can solve the problem by brute force, we will compare each character of text1 and text2, then recursively store the longest matching sting length of these two string. Then we will use memoization to reduce the repetative work, and make it efficient.

```python
class Solution:
    def longestCommonSubsequence(self, text1: str, text2: str) -> int:
        def _longestCommonSubsequence(i1, i2, memo):
            if (i1, i2) in memo:
                return memo[(i1, i2)]
            if i1 == len(text1) or i2 == len(text2):
                return 0
            
            if text1[i1] == text2[i2]:
                memo[(i1, i2)] = 1 + _longestCommonSubsequence(i1+1, i2+1, memo)
            else: 
                memo[(i1, i2)] = max(
                    _longestCommonSubsequence(i1+1, i2, memo), 
                    _longestCommonSubsequence(i1, i2+1, memo)
                )
                
            return memo[(i1, i2)]
            
        return _longestCommonSubsequence(0, 0, {})
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`