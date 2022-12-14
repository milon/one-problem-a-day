---
extends: _layouts.post
section: content
title: Minimum number of operations to move all balls to each box
problemUrl: https://leetcode.com/problems/minimum-number-of-operations-to-move-all-balls-to-each-box/
date: 2022-12-14
categories: [array-and-hashmap]
---

The question needs to search for balls left and right relative to the current box. If we use [1,1,0] as example, in the second box (i.e. boxes[1]):
You will need to find the first box value (go left), and the third box value (go right), which makes it hard to do one pass. So, instead of one pass, this solution first go from left to right, then back from right to left, and accumulate the needed numbers of balls. And then, reverse the input, and go the above operation again, which makes the result.

```python
class Solution:
    def minOperations(self, boxes: str) -> List[int]:
        n = len(boxes)
        res = [0] * n
        for l in range(n), reversed(range(n)):
            cur = steps = 0
            for r in l:
                res[r] += steps
                cur += int(boxes[r])
                steps += cur
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`