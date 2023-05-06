---
extends: _layouts.post
section: content
title: Substrings that begin and end with the same letter
problemUrl: https://leetcode.com/problems/substrings-that-begin-and-end-with-the-same-letter/
date: 2023-05-05
categories: [array-and-hashmap, math-and-geometry]
---

Traverse from left to right, when visiting a character C, number of substring that begin and end with C in the prefix substring is the frequency of C (in this prefix substring)+1.

```python
class Solution:
    def numberOfSubstrings(self, s: str) -> int:
        res = 0
        lookup = collections.defaultdict(int)
        for c in s:
            lookup[c] += 1
            res += lookup[c]
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`