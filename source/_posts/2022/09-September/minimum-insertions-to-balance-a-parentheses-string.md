---
extends: _layouts.post
section: content
title: Minimum insertions to balance a parentheses string
problemUrl: https://leetcode.com/problems/minimum-insertions-to-balance-a-parentheses-string/
date: 2022-09-16
categories: [stack, greedy]
---

We will iterate over each character, if the character is `(`, then we need 2 more, and if it is `)`, the we remove one from need. If the need is not even, then we add 1 in our result and remove it from the need. If need reached -1, then we add 1 to result and reset need to 1. Finally we return need + result.

```python
class Solution:
    def minInsertions(self, s: str) -> int:
        res, need = 0, 0
        for c in s:
            if c == '(':
                need += 2
                
                if need % 2 == 1:
                    res += 1
                    need -= 1    
            else:
                need -= 1
                
                if need == -1:
                    res += 1
                    need = 1
        return res + need
```

Time Complexity: `O(n)`<br/>
Space Complexity: `O(1)`