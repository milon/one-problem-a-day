---
extends: _layouts.post
section: content
title: Longest string chain
problemUrl: https://leetcode.com/problems/longest-string-chain/
date: 2022-12-03
categories: [dynamic-programming]
---

We will use DFS to find the lognest possible word chain end at word. To calculate dfs(word), we try all predecessors of word word and get the maximum length among them.

```python
class Solution:
    def longestStrChain(self, words: List[str]) -> int:
        wordSet = set(words)
        
        @cache
        def dfs(word):
            res = 1
            for i in range(len(word)):
                predecessor = word[:i] + word[i+1:]
            
                if predecessor in wordSet:
                    res = max(res, dfs(predecessor)+1)
            
            return res
        
        return max(dfs(word) for word in words)
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`