---
extends: _layouts.post
section: content
title: Is subsequence
problemUrl: https://leetcode.com/problems/is-subsequence/
date: 2022-10-06
categories: [two-pointers]
---

We will take two pointers, and then go through both string and increase the number of the pointers. When we exit the loop, if the pointer value of the first pointer is equal to the lenght of the first sting, we return true otherwise false.

```python
class Solution:
    def isSubsequence(self, s: str, t: str) -> bool:
        i, j = 0, 0
        while i < len(s) and j < len(t):
            if s[i] == t[j]:
                i += 1
            j += 1
        return i == len(s)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`