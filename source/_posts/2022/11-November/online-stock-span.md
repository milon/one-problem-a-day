---
extends: _layouts.post
section: content
title: Online stock span
problemUrl: https://leetcode.com/problems/online-stock-span/
date: 2022-11-09
categories: [stack]
---

We will use a stack to keep track of the previous prices. We will then iterate over the prices and pop the stack until the top of the stack is greater than the current price. We will then push the current price and the current index onto the stack. We will then return the difference between the current index and the index of the top of the stack.

```python
class StockSpanner:
    def __init__(self):
        self.stack = [(inf, 0)]

    def next(self, price: int) -> int:
        curDay = self.stack[-1][1]+1
        
        while price >= self.stack[-1][0]:
            self.stack.pop()
            
        span = curDay - self.stack[-1][1]
        
        self.stack.append((price, curDay))
        
        return span

# Your StockSpanner object will be instantiated and called as such:
# obj = StockSpanner()
# param_1 = obj.next(price)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`