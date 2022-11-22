---
extends: _layouts.post
section: content
title: Number of ways to paint N×3 grid
problemUrl: https://leetcode.com/problems/number-of-ways-to-paint-n-3-grid/
date: 2022-11-22
categories: [dynamic-programming]
---

Two pattern for each row, 121 and 123. 121, the first color same as the third in a row. 123, one row has three different colors.

We consider the state of the first row, <br/>
pattern 121: 121, 131, 212, 232, 313, 323.<br/>
pattern 123: 123, 132, 213, 231, 312, 321.<br/>
So we initialize a121 = 6, a123 = 6.

We consider the next possible for each pattern:<br/>
Patter 121 can be followed by: 212, 213, 232, 312, 313<br/>
Patter 123 can be followed by: 212, 231, 312, 232

121 => three 121, two 123<br/>
123 => two 121, two 123

So we can write this dynamic programming transform equation:<br/>
b121 = a121 * 3 + a123 * 2 <br/>
b123 = a121 * 2 + a123 * 2 

We calculate the result iteratively and finally return the sum of both pattern a121 + a123.

```python
class Solution:
    def numOfWays(self, n: int) -> int:
        a121, a123 = 6, 6
        for _ in range(n-1):
            b121 = a121 * 3 + a123 * 2
            b123 = a121 * 2 + a123 * 2
            a121, a123 = b121, b123
        return (a121 + a123) % (10**9 + 7)
```

Time Complexity: `O(n)`, n is the number of rows.<br/>
Space Complexity: `O(1)`