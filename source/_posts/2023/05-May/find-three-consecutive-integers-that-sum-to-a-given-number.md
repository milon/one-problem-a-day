---
extends: _layouts.post
section: content
title: Find three consecutive integers that sum to a given number
problemUrl: https://leetcode.com/problems/find-three-consecutive-integers-that-sum-to-a-given-number/
date: 2023-05-22
categories: [math-and-geometry]
---

We will check whether the number is divisible by 3. If it is, we can return the three consecutive numbers. Otherwise, we will return empty arry.

```python
class Solution:
    def sumOfThree(self, num: int) -> List[int]:
        if num % 3 != 0:
            return []
        
        n = num // 3;
        return [n-1, n, n+1]
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`