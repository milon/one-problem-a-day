---
extends: _layouts.post
section: content
title: Sell diminishing valued colored balls
problemUrl: https://leetcode.com/problems/sell-diminishing-valued-colored-balls/
date: 2022-09-03
categories: [heap]
---

One naive approach is to repeat for orders times, and each time, take the largest one, decrease it and place back to the array. This will take O(orders * logN) time complexity if using heap.
Let's sort the array first, from max to min.

One important observation is that: if max of array is max1, second max is max2, then one can safely take the "max" for (max1 - max2) times, then the original max1 becomes max2. <br/>
[max1, max2, max3, max4, ...] -> [max2, max2, max3, max4, ...] <br/>
Then, we can safely take the first two elements for (max2 - max3) times, and the array becomes: <br/>
[max3, max3, max3, max4, ...]

```python
class Solution:
    def maxProfit(self, inventory: List[int], orders: int) -> int:
        MOD = 10**9+7
        
        n = len(inventory)
        inventory.sort(reverse=True)
        inventory.append(0)
        
        score = 0
        for i in range(n):
            max1, max2 = inventory[i], inventory[i+1]
            num = (i+1)*(max1-max2)
            if num < orders:
                score += (max1 + max2 + 1) * (max1 - max2) // 2 * (i+1)
            else:
                num = orders
                lap = num // (i + 1)
                rem = num % (i + 1)
                score += (max1 + max1 - lap + 1) * lap // 2 * (i + 1)
                score += (max1 - lap) * rem
                break
            orders -= num
        
        return score % MOD
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`