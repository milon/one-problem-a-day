---
extends: _layouts.post
section: content
title: Find k length substrings with no repeated characters
problemUrl: https://leetcode.com/problems/find-k-length-substrings-with-no-repeated-characters/
date: 2022-12-03
categories: [sliding-window]
---

We will use a sliding window to solve this problem. The window will be a substring of the input string. The window will be valid if it has no repeated characters. We will keep track of the number of valid windows.

```python
class Solution:
    def numKLenSubstrNoRepeats(self, s: str, k: int) -> int:
        count = collections.defaultdict(int)
        i, res = 0, 0
        for j, ch in enumerate(s):
            count[ch] += 1
            while j-i+1 > k:
                count[s[i]] -= 1
                if count[s[i]] == 0:
                    del count[s[i]]
                i += 1
            if j-i+1 == k and len(count) == k:
                res += 1
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`