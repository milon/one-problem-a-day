---
extends: _layouts.post
section: content
title: Maximum bags with full capacity of rocks
problemUrl: https://leetcode.com/problems/maximum-bags-with-full-capacity-of-rocks/
date: 2022-12-27
categories: [greedy]
---

We will sort the rocks by weight and then iterate over them. If the current rock fits in the bag, we will add it to the bag. Otherwise, we will create a new bag.

```python
class Solution:
    def maximumBags(self, capacity: List[int], rocks: List[int], additionalRocks: int) -> int:
        count = sorted(c - r for c,r in zip(capacity, rocks))[::-1]
        while count and additionalRocks and count[-1] <= additionalRocks:
            additionalRocks -= count.pop()
        return len(rocks) - len(count)
```

Time complexity: `O(nlog(n))`
Space complexity: `O(n)`