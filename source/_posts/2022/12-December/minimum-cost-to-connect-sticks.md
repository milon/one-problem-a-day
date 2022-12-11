---
extends: _layouts.post
section: content
title: Minimum cost to connect sticks
problemUrl: https://leetcode.com/problems/minimum-cost-to-connect-sticks/
date: 2022-12-11
categories: [heap]
---

We will use a heap to store the sticks. We will keep on popping the two smallest sticks from the heap and we will add their sum to the result. We will push the sum of the two sticks to the heap. We will keep on doing this until there is only one stick left in the heap. At the end, we will return the result.

```python
class Solution:
    def connectSticks(self, sticks: List[int]) -> int:
        heapq.heapify(sticks)
        res = 0
        while len(sticks) > 1:
            a = heapq.heappop(sticks)
            b = heapq.heappop(sticks)
            res += (a+b)
            heapq.heappush(sticks, a+b)
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`