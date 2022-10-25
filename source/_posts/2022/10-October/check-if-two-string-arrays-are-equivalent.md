---
extends: _layouts.post
section: content
title: Check if two string arrays are equivalent
problemUrl: https://leetcode.com/problems/check-if-two-string-arrays-are-equivalent/
date: 2022-10-25
categories: [array-and-hashmap]
---

We will join the two arrays to strings and check if they are equal.

```python
class Solution:
    def arrayStringsAreEqual(self, word1: List[str], word2: List[str]) -> bool:
        return ''.join(word1) == ''.join(word2)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`