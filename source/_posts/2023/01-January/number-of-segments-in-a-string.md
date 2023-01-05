---
extends: _layouts.post
section: content
title: Number of segments in a string
problemUrl: https://leetcode.com/problems/number-of-segments-in-a-string/
date: 2023-01-05
categories: [array-and-hashmap]
---

We will split the string by space, then count the number of non-empty string.

```python
class Solution:
    def countSegments(self, s: str) -> int:
        return len(s.split())
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
