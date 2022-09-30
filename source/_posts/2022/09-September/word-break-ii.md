---
extends: _layouts.post
section: content
title: Word break II
problemUrl: https://leetcode.com/problems/word-break-ii/
date: 2022-09-30
categories: [trie, backtracking]
---

We will use backtracking to find all possible word match from our word dictionary and add that to our result array and finally return it.

```python
class Solution:
    def wordBreak(self, s: str, wordDict: List[str]) -> List[str]:
        res = []
        
        def backtrack(start, path):
            if start == len(s):
                res.append(' '.join(path))
                return
            
            for i in range(start, len(s)+1):
                if s[start:i] in wordDict:
                    path.append(s[start:i])
                    backtrack(i, path)
                    path.pop()
        
        backtrack(0, [])
        return res    
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`
