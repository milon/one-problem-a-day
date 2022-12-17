---
extends: _layouts.post
section: content
title: Add two integers
problemUrl: https://leetcode.com/problems/add-two-integers/
date: 2022-12-17
categories: [math-and-geometry]
---

This is a stupid problem. We can just add to numbers and return the result.

```python
class Solution:
    def sum(self, num1: int, num2: int) -> int:
        return num1+num2
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`