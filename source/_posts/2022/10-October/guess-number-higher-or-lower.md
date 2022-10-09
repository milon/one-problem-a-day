---
extends: _layouts.post
section: content
title: Guess number higher or lower
problemUrl: https://leetcode.com/problems/guess-number-higher-or-lower/
date: 2022-10-09
categories: [binary-search]
---

This is a classic binary search problem. We will use binary search to find the number. We will use provided `guess` function to check whether the number is equal to the target or not.

```python
# The guess API is already defined for you.
# @param num, your guess
# @return -1 if num is higher than the picked number
#          1 if num is lower than the picked number
#          otherwise return 0
# def guess(num: int) -> int:

class Solution:
    def guessNumber(self, n: int) -> int:
        l, r = 1, n
        while l <= r:
            m = (l+r)//2
            res = guess(m)
            if res == 0 :
                return m
            elif res == -1:
                r = m-1
            else:
                l = m+1
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`