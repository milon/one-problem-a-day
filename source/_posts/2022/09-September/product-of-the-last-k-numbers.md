---
extends: _layouts.post
section: content
title: Product of the last k numbers
problemUrl: https://leetcode.com/problems/product-of-the-last-k-numbers/
date: 2022-09-28
categories: [queue, design]
---

We will calculate the prefix product while adding number to the queue. Then while getting the product, we will divive the last item with the last kth item to get the product of last k elements.

```python
class ProductOfNumbers:
    def __init__(self):
        self.array = [1]

    def add(self, num: int) -> None:
        if num == 0:
            self.array = [1]
        else:
            self.array.append(self.array[-1] * num)

    def getProduct(self, k: int) -> int:
        if k >= len(self.array): 
            return 0
        return self.array[-1] // self.array[-k-1]

# Your ProductOfNumbers object will be instantiated and called as such:
# obj = ProductOfNumbers()
# obj.add(num)
# param_2 = obj.getProduct(k)
```

Time Complexity: `O(1)` for each operation <br/>
Space Complexity: `O(n)`
