---
extends: _layouts.post
section: content
title: Fruit into baskets
problemUrl: https://leetcode.com/problems/fruit-into-baskets/
date: 2022-10-28
categories: [sliding-window]
---

We will use a sliding window to keep track of the fruits in the current basket. We will keep track of the last fruit we have seen and the number of times we have seen it. If the current fruit is the same as the last fruit, we will increment the count. If the current fruit is different from the last fruit, we will check if the current fruit is already in the basket. If it is, we will increment the count. If it is not, we will remove the last fruit from the basket and add the current fruit to the basket. We will keep track of the maximum number of fruits in the basket.

```python
class Solution:
    def totalFruit(self, fruits: List[int]) -> int:
        count, i = {}, 0
        for j, v in enumerate(fruits):
            count[v] = count.get(v, 0)+1
            if len(count) > 2:
                count[fruits[i]] -= 1
                if count[fruits[i]] == 0: 
                    del count[fruits[i]]
                i += 1
        return j-i+1
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`