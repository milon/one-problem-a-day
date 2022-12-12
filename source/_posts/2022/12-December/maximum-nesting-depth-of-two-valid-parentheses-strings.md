---
extends: _layouts.post
section: content
title: Maximum nesting depth of two valid parentheses strings
problemUrl: https://leetcode.com/problems/maximum-nesting-depth-of-two-valid-parentheses-strings/
date: 2022-12-12
categories: [stack]
---

We will keep on iterating over the string and we will keep on pushing the current character into the stack. If the current character is `(`, we will increment the current depth. If the current character is `)`, we will decrement the current depth. If the current depth is greater than the maximum depth, we will update the maximum depth to be the current depth. We will keep on doing this until we have processed all the characters. At the end, we will return the maximum depth.

```python
class Solution:
    def maxDepthAfterSplit(self, seq: str) -> List[int]:
        A = B = 0
        res = [0] * len(seq)
        for i, c in enumerate(seq):
            v = 1 if c == '(' else -1
            if (v > 0) == (A < B):
                A += v
            else:
                B += v
                res[i] = 1
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`