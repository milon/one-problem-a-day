---
extends: _layouts.post
section: content
title: Maximum number of balloons
problemUrl: https://leetcode.com/problems/maximum-number-of-balloons/
date: 2022-11-05
categories: [array-and-hashmap]
---

We will count all the characters, then we will return the minimum of the count of `b`, `a`, `l`, `o`, and `n`, as the number of `l` and `o` are counted twice, we will divide the count by 2.

```python
class Solution:
    def maxNumberOfBalloons(self, text: str) -> int:
        count = collections.Counter(text)
        return min([count['b'], count['a'], count['l']//2, count['o']//2, count['n']])
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`