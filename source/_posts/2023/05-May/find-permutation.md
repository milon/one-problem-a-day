---
extends: _layouts.post
section: content
title: Find permutation
problemUrl: https://leetcode.com/problems/find-permutation/
date: 2023-05-12
categories: [array-and-hashmap]
---

Loop on the input and insert a decreasing numbers when see a 'I'. Or insert a decreasing numbers to complete the result.

```python
class Solution:
    def findPermutation(self, s: str) -> List[int]:
        res = []
        for i in range(len(s)):
            if s[i] == 'I':
                res.extend(range(i+1, len(res), -1))
        res.extend(range(len(s)+1, len(res), -1))
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`