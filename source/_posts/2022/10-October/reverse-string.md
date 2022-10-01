---
extends: _layouts.post
section: content
title: Reverse string
problemUrl: https://leetcode.com/problems/reverse-string/
date: 2022-10-01
categories: [two-pointers]
---

We will take 2 pointers, one at the beginning and one at the end of the string. Then we swap their position and move to the next character. Once these two pointers meet, we stop.

```python
class Solution:
    def reverseString(self, s: List[str]) -> None:
        l, r = 0, len(s)-1
        while l<=r:
            s[l], s[r] = s[r], s[l]
            l += 1
            r -= 1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`