---
extends: _layouts.post
section: content
title: Maximum ice cream bars
problemUrl: https://leetcode.com/problems/maximum-ice-cream-bars/
date: 2023-01-06
categories: [greedy, heap]
---

We will sort the input `costs` array, then iterate the array, if the current cost is less than `coins`, we will update `coins` to be `coins-costs[i]`, and increment `res` by 1.

```python
class Solution:
    def maxIceCream(self, costs: List[int], coins: int) -> int:
        res = 0
        for cost in sorted(costs):
            if coins < cost:
                break
            res += 1
            coins -= cost
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`

You can also solve this problem using heap. We will heapify the costs and pop the minimum cost from the heap if the current cost is less than `coins`, we will update `coins` to be `coins-costs[i]`, and increment `res` by 1.

```python
class Solution:
    def maxIceCream(self, costs: List[int], coins: int) -> int:
        res = 0
        heapq.heapify(costs)
        while costs and coins >= costs[0]:
            res += 1
            coins -= heappop(costs)
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`