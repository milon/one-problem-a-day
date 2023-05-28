---
extends: _layouts.post
section: content
title: Number of substrings containing all three characters
problemUrl: https://leetcode.com/problems/number-of-substrings-containing-all-three-characters/
date: 2023-05-28
categories: [sliding-window]
---

We can use a sliding window to solve the problem. We will use a variable `count` to store the number of substrings containing all three characters. Then we will iterate over the string and update `count` accordingly. Finally, we will return `count`.

```python
class Solution:
    def numberOfSubstrings(self, s: str) -> int:
        res = i = 0
        count = {c: 0 for c in 'abc'}
        for j in range(len(s)):
            count[s[j]] += 1
            while all(count.values()):
                count[s[i]] -= 1
                i += 1
            res += i
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`