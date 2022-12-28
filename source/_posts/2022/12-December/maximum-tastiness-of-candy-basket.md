---
extends: _layouts.post
section: content
title: Maximum tastiness of candy basket
problemUrl: https://leetcode.com/problems/maximum-tastiness-of-candy-basket/
date: 2022-12-28
categories: [binary-search]
---

We will sort the prices of the candies. Then we run a binary search in the range 0 to the maximum difference between the candies. The check function iterates over the array prices and checks if the given value x can be the minimum difference for any subsequence of the array prices.

```python
class Solution:
    def maximumTastiness(self, price: List[int], k: int) -> int:
        if k == 0:
            return 0
        price.sort()
        
        def isValid(num: int) -> int:
            n = len(price)
            count = 1
            diff = price[0] + num
            for i in range(1, n):
                if price[i] >= diff:
                    diff = price[i] + num
                    count += 1
            return count
        
        low, high = 0, max(price)-min(price)
        res = -1
        while low <= high:
            mid = (low + high) // 2
            if isValid(mid) >= k:
                res = mid
                low = mid+1
            else:
                high = mid-1
        
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`