---
extends: _layouts.post
section: content
title: Car pooling
problemUrl: https://leetcode.com/problems/car-pooling/
date: 2023-01-02
categories: [array-and-hashmap]
---

We will sort the trips by the starting point. Then we will iterate over the trips and for each trip we will add the number of passengers to the current number of passengers. If the current number of passengers is greater than the capacity, we will return `False`. Otherwise, we will return `True`.

```python
class Solution:
    def carPooling(self, trips: List[List[int]], capacity: int) -> bool:
        lst = []
        for n, start, end in trips:
            lst.append((start, n))
            lst.append((end, -n))
        lst.sort()
        
        pas = 0
        for loc in lst:
            pas += loc[1]
            if pas > capacity:
                return False
        return True
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(n)`