---
extends: _layouts.post
section: content
title: Bulb switcher
problemUrl: https://leetcode.com/problems/bulb-switcher/
date: 2022-09-27
categories: [math-and-geometry]
---

Basically, if bulb A has an odd number of factors, then that bulb will be on in the end because each bulb is off at the start. If bulb Ahas an even number of factors, then that bulb will be off in the end because each bulb is off at the start. The only cases where A will have an odd number of factors is when n is a perfect square.

So we can count the number of squares between 1 and n which is sqrt(n).

```python
class Solution:
    def bulbSwitch(self, n: int) -> int:
        return int(sqrt(n))
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`