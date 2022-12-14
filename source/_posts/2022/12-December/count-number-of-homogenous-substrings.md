---
extends: _layouts.post
section: content
title: Count number of homogenous substrings
problemUrl: https://leetcode.com/problems/count-number-of-homogenous-substrings/
date: 2022-12-14
categories: [array-and-hashmap]
---

We will use a sliding window approach to solve this problem. We will iterate over the string and keep track of the start and end of the current substring. We will increment the end of the substring until we find a different character. We will calculate the number of substrings that can be formed from the current substring and add it to the result. We will update the start of the substring to the end of the current substring.

```python
class Solution:
    def countHomogenous(self, s: str) -> int:
        cur, MOD = '', 10**9+7
        count, res = 0, 0
        for ch in s:
            if ch != cur:
                cur, count = ch, 0
            count += 1
            res += count
        return res % MOD
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`