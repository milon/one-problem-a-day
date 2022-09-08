---
extends: _layouts.post
section: content
title: Repeated dna sequences
problemUrl: https://leetcode.com/problems/repeated-dna-sequences/
date: 2022-09-08
categories: [sliding-window]
---

We will use a sliding window which is 10 characters long. For each window, we will add this to a lookup set. If the window is already present in the lookup set, that means we already have it more than once, we will add this to our result set, we are using set as we don't want duplicate substring. Finally we will return the result once the sliding window reaches the end of the string.

```python
class Solution:
    def findRepeatedDnaSequences(self, s: str) -> List[str]:
        lookup, res = set(), set()
        for i in range(len(s)-9):
            sub = s[i:i+10]
            if sub in lookup:
                res.add(sub)
            lookup.add(sub)
        return list(res)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`