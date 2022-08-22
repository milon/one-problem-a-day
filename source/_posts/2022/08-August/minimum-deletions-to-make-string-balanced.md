---
extends: _layouts.post
section: content
title: Minimum deletions to make string balanced
problemUrl: https://leetcode.com/problems/minimum-deletions-to-make-string-balanced/
date: 2022-08-22
categories: [dynamic-programming]
---

We can count the number of occurance of `b` and then reduce the count with an upcoming `a` character, also increase the result count on the way. Finally return our result count after the iteration is done.

```python
class Solution:
    def minimumDeletions(self, s: str) -> int:
        bCount = 0
        res = 0
        for char in s:
            if char == "b":
                bCount += 1
            else:
                if bCount > 0:
                    res += 1
                    bCount -= 1
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`