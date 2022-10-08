---
extends: _layouts.post
section: content
title: Find the index of the first occurrence in a string
problemUrl: https://leetcode.com/problems/find-the-index-of-the-first-occurrence-in-a-string/
date: 2022-10-08
categories: [sliding-window]
---

We will create a substring of length of the needle and compare it with the needle, if we find a match, we return the index as result, otherwise return -1.

```python
class Solution:
    def strStr(self, haystack: str, needle: str) -> int:
        for i in range(len(haystack) - len(needle) + 1):
            if haystack[i:i+len(needle)] == needle:
                return i
        return -1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`

We can use python's builtin functions to achieve it even easier.

```python
class Solution:
    def strStr(self, haystack: str, needle: str) -> int:
        if needle not in haystack:
            return -1
        return haystack.index(needle)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`