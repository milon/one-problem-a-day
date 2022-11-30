---
extends: _layouts.post
section: content
title: Partitioning into minimum number of deci binary numbers
problemUrl: https://leetcode.com/problems/partitioning-into-minimum-number-of-deci-binary-numbers/
date: 2022-11-30
categories: [greedy]
---

Assume max digit in n is x, because deci-binary only contains 0 and 1, we need at least x numbers to sum up a digit x. So we can just find the max digit in n and return it.

```python
class Solution:
    def minPartitions(self, n: str) -> int:
        return int(max(n))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`