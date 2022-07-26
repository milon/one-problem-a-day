---
extends: _layouts.post
section: content
title: Cheapest flights within k stops
problemUrl: https://leetcode.com/problems/cheapest-flights-within-k-stops/
date: 2022-07-26
categories: [graph]
---

We will solve the problem using Bellman-Ford algorithm. Initially we will assign infinity prices to all nodes except the source nodes price will be 0. We will basically run the BFS for k+1 steps as we are allowed to take k stops. In the process we will update our prices if we find a cheaper option. After k+1 steps of BFS, if we find a price that is not infinity, we return that. The the price is still infinity, that means we can't reach the destination with k stops, so we return -1.

```python
class Solution:
    def findCheapestPrice(self, n: int, flights: List[List[int]], src: int, dst: int, k: int) -> int:
        prices = [math.inf] * n
        prices[src] = 0

        for i in range(k+1):
            tempPrices = prices.copy()

            for s, d, p in flights:
                if prices[s] == math.inf:
                    continue
                if prices[s] + p < tempPrices[d]:
                    tempPrices[d] = prices[s] + p
            prices = tempPrices

        return -1 if prices[dst] == math.inf else prices[dst]
```

Time Complexity: `O(n*k)`, n is the number of vertices, k is the number of stops. <br/>
Space Complexity: `O(n)`
