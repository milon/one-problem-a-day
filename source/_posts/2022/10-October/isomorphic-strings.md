---
extends: _layouts.post
section: content
title: Isomorphic strings
problemUrl: https://leetcode.com/problems/isomorphic-strings/
date: 2022-10-21
categories: [array-and-hashmap]
---

We can iterate over both string at the same time and look for the first occurrence of each character. If the first occurrence of the character in both strings is not the same, then we will return false. Otherwise, we will return true.

```python
class Solution:
    def isIsomorphic(self, s: str, t: str) -> bool:
        for i, j in zip(s, t):
            if s.find(i) != t.find(j):
                return False
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`