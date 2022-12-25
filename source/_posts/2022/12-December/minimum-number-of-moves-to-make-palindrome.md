---
extends: _layouts.post
section: content
title: Minimum number of moves to make palindrome
problemUrl: https://leetcode.com/problems/minimum-number-of-moves-to-make-palindrome/
date: 2022-12-25
categories: [two-pointers]
---

We will iterate over the string and count the number of moves for each character. We will update the result.

```python
class Solution:
    def minMovesToMakePalindrome(self, s: str) -> int:
        s = list(s)
        res = 0
        left, right = 0, len(s)-1
        while left < right:
            l, r = left, right
            while s[l] != s[r]:
                r -= 1
            if l == r:
                s[r], s[r + 1] = s[r + 1], s[r]
                res += 1
                continue
            else:
                while r < right:
                    s[r], s[r + 1] = s[r + 1], s[r]
                    res += 1
                    r += 1
            left += 1
            right -= 1
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(1)`