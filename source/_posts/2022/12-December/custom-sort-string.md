---
extends: _layouts.post
section: content
title: Custom sort string
problemUrl: https://leetcode.com/problems/custom-sort-string/
date: 2022-12-24
categories: [array-and-hashmap]
---

We will use a hashmap to store the order of characters in `order`. We will iterate over `s` and store the characters in a list. We will sort the list using the order of characters in `order`. We will return the res.

```python
class Solution:
    def customSortString(self, order: str, s: str) -> str:
        res = ''
        count = collections.Counter(s)
        
        for ch in order:
            res += ch * count[ch]
            del count[ch]

        res += ''.join(cnt*count[cnt] for cnt in count)
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`