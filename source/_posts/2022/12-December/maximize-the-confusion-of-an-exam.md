---
extends: _layouts.post
section: content
title: Maximize the confusion of an exam
problemUrl: https://leetcode.com/problems/maximize-the-confusion-of-an-exam/
date: 2022-12-09
categories: [sliding-window]
---

We will use a sliding window to solve this problem. The window will be the size of the maximum number of consecutive characters that can be changed. We will count the maximum number of consecutive characters that are the same as the `T` character in the window. We will then count the same for character `F`. The answer will be the maximum of the two.

```python
class Solution:
    def maxConsecutiveAnswers(self, answerKey: str, k: int) -> int:
        def countChar(char: str) -> int:
            res, count, l = 0, 0, 0
            for r, ch in enumerate(answerKey):
                if ch == char:
                    count += 1
                while count > k:
                    if answerKey[l] == char:
                        count -= 1
                    l += 1
                res = max(res, r-l+1)
            return res
        
        return max(countChar('T'), countChar('F'))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`