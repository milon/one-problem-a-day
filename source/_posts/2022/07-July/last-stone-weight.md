---
extends: _layouts.post
section: content
title: Last stone weight
problemUrl: https://leetcode.com/problems/last-stone-weight/
date: 2022-07-23
categories: [heap]
---

We will use a max heap and then pop 2 element at a time and simulate the problem statement. As python doesn't have any max heap, we will use the min heap but multiply each element with -1 and the the whole simulation is done we will get the absolute value of the result and return.

```python
class Solution:
    def lastStoneWeight(self, stones: List[int]) -> int:
        stones = [-s for s in stones]
        heapq.heapify(stones)

        while len(stones) > 1:
            first = heapq.heappop(stones)
            second = heapq.heappop(stones)
            if second > first:
                heapq.heappush(stones, first - second)

        stones.append(0)
        return abs(stones[0])
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`