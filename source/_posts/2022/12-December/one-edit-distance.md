---
extends: _layouts.post
section: content
title: One edit distance
problemUrl: https://leetcode.com/problems/one-edit-distance/
date: 2022-12-05
categories: [array-and-hashmap]
---

We will check if the length of the strings are equal or not. If they are equal, we will check if there is only one character that is different. If they are not equal, we will check if the length difference is 1 and if there is only one character that is different.

```python
class Solution:
    def isOneEditDistance(self, s: str, t: str) -> bool:
        if s == t:
            return False
        
        i = 0
        while i < min(len(s), len(t)):
            if s[i] == t[i]:
                i += 1
            else:
                break
        
        return s[i+1:] == t[i+1:] or s[i:] == t[i+1:] or s[i+1:]==t[i:]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`