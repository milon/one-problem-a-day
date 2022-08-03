---
extends: _layouts.post
section: content
title: Minimum window substring
problemUrl: https://leetcode.com/problems/minimum-window-substring/
date: 2022-08-03
categories: [sliding-window]
---

We will first count the number of characters in the search substring. Then we create a sliding window, and move it along the whole string. If some character is missing in the sliding window, we then add more character in the string, and compare, whenever we find a match, we store those positions. If later on the string, if we find another match which is smaller than the current one, we replace it with the smaller one. Once the sliding window reaches the end of the string, we return the minimum substring.

```python
class Solution:
    def minWindow(self, s: str, t: str) -> str:
        need, missing = collections.Counter(t), len(t)
        i = I = J = 0
        for j, c in enumerate(s, 1):
            missing -= need[c] > 0
            need[c] -= 1
            if not missing:
                while i < j and need[s[i]] < 0:
                    need[s[i]] += 1
                    i += 1
                if (not J) or (j - i) <= (J - I):
                    I, J = i, j
        return s[I:J]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`