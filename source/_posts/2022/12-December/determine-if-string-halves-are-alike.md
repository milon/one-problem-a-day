---
extends: _layouts.post
section: content
title: Determine if string halves are alike
problemUrl: https://leetcode.com/problems/determine-if-string-halves-are-alike/
date: 2022-12-01
categories: [array-and-hashmap]
---

We will itrerate over the string, for first half we increase the count and for second half we decrease the count. At the end if the count is 0, then the string halves are alike.

```python
class Solution:
    def halvesAreAlike(self, s: str) -> bool:
        count = 0
        for i, ch in enumerate(s):
            if ch.lower() in "aeiou":
                count += 1 if i < len(s)//2 else -1
        return count == 0             
```

Time complexity: `O(n)`
Space complexity: `O(1)`