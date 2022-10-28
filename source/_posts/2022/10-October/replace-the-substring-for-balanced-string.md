---
extends: _layouts.post
section: content
title: Replace the substring for balanced string
problemUrl: https://leetcode.com/problems/replace-the-substring-for-balanced-string/
date: 2022-10-28
categories: [sliding-window]
---

We will use a sliding window to keep track of the number of characters in the current substring. We will keep track of the number of characters we need to replace. We will keep track of the minimum length of the substring we need to replace.

```python
class Solution:
    def balancedString(self, s: str) -> int:
        count = collections.Counter(s)
        res = n = len(s)
        i = 0
        for j, c in enumerate(s):
            count[c] -= 1
            while i<n and all(n/4 >= count[c] for c in 'QWER'):
                res = min(res, j-i+1)
                count[s[i]] += 1
                i += 1
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`