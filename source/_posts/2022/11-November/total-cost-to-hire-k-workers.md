---
extends: _layouts.post
section: content
title: Total cost to hire k workers
problemUrl: https://leetcode.com/problems/total-cost-to-hire-k-workers/
date: 2022-11-21
categories: [heap]
---

We will sort the workers by their quality and iterate through them. For each worker, we will add their wage to the heap and remove the highest wage if the heap size is greater than `k`. We will also keep track of the sum of the wages in the heap. If the heap size is equal to `k`, we will calculate the total cost and update the minimum cost.

```python
class Solution:
    def totalCost(self, costs: List[int], k: int, candidates: int) -> int:
        costs = collections.deque(costs)
        total, first, last = 0, [], []
        for _ in range(k):
            while len(first) < candidates:
                heapq.heappush(first, costs.popleft() if costs else math.inf)
            while len(last) < candidates:
                heapq.heappush(last, costs.pop() if costs else math.inf)
            total += heapq.heappop(first) if first[0] <= last[0] else heapq.heappop(last)
        return total
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`