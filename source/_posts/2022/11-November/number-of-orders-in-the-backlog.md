---
extends: _layouts.post
section: content
title: Number of orders in the backlog
problemUrl: https://leetcode.com/problems/number-of-orders-in-the-backlog/
date: 2022-11-20
categories: [heap]
---

We will use two heaps to keep track of the buy and sell orders. The buy orders will be stored in a max heap and the sell orders will be stored in a min heap. We will also keep track of the total number of orders in the backlog.

```python
class Solution:
    def getNumberOfBacklogOrders(self, orders: List[List[int]]) -> int:
        sell, buy = [], []
        for p, a, t in orders:
            if t == 0:
                heapq.heappush(buy, [-p, a])
            else:
                heapq.heappush(sell, [p, a])
                
            while sell and buy and sell[0][0] <= -buy[0][0]:
                k = min(buy[0][1], sell[0][1])
                buy[0][1] -= k
                sell[0][1] -= k
                if buy[0][1] == 0: 
                    heapq.heappop(buy)
                if sell[0][1] == 0: 
                    heapq.heappop(sell)
                    
        return sum(a for p, a in buy+sell) % (10**9+7)
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`