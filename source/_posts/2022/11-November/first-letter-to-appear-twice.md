---
extends: _layouts.post
section: content
title: First letter to appear twice
problemUrl: https://leetcode.com/problems/first-letter-to-appear-twice/
date: 2022-11-18
categories: [array-and-hashmap]
---

We will use a hashset to keep track of the letters we have seen. If we see a letter that is already in the hashset, we return it. Otherwise we add it to the hashset.

```python
class Solution:
    def firstRepeatedCharacter(self, s: str) -> str:
        seen = set()
        for c in s:
            if c in seen:
                return c
            seen.add(c)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`