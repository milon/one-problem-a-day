---
extends: _layouts.post
section: content
title: Flip string to monotone increasing
problemUrl: https://leetcode.com/problems/flip-string-to-monotone-increasing/
date: 2023-01-17
categories: [array-and-hashmap]
---

A string of `'0'`s and `'1'`s is monotone increasing if it consists of some number of `'0'`s (possibly 0), followed by some number of `'1'`s (also possibly 0.)

- So we iterate throughs, but for all0before the initial 1, we count nothing. It only becomes interesting once we hit a1. We could rephrase the problem to: )*Discard all the initial0, then determine which requires fewer flips: changing the remaining string to all0, or changing it to all1.*
- For each 1 we hit, we incrementones.
- For each 0 we hit after the initial 1, we decrementones and increment res, but only if onesis positive. Here's the reason why–in order to achieve a monotonic string, we need to flip either this 0 or the most recent 1. We won't know which flip would actually happen until the end, but either way it would cause a flip.
- Once we iterate through the string, we return res.

```python
class Solution:
    def minFlipsMonoIncr(self, s: str) -> int:
        ones, res = 0, 0
        for num in s:
            if num == '1':
                ones += 1
            elif ones:
                ones -= 1
                res += 1
        return res
```

Time complexity: `O(n)`, n is the length of the string. <br/>
Space complexity: `O(1)`