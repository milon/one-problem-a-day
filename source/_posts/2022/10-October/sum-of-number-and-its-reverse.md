---
extends: _layouts.post
section: content
title: Sum of number and its reverse
problemUrl: https://leetcode.com/problems/sum-of-number-and-its-reverse/
date: 2022-10-28
categories: [math-and-geometry]
---

We will try every number till the original given number, reverse the number and add it to the original number.

```python
class Solution:
    def sumOfNumberAndReverse(self, num: int) -> bool:
        for i in range(num+1):
            if i + int(str(i)[::-1]) == num:
                return True
        return False
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`